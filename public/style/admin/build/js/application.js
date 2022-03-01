'use strict';
$(function() {
    /* Admin Home */

    var _button = $('.js-track-resi-btn');
    var _formValidation = $('.form-validation');
    var _resi_field = $('.js-track-resi-field');

    function validate() {
        var disabled = false;
        _formValidation.each(function() {
            if ($(this).val() === "") {
                disabled = true;
                return false;
            }
        });
        _button.attr('disabled', disabled);
    }

    if(_formValidation.length > 0) {
        validate();
        _resi_field.keyup(function () {
            $(this).valid();
            validate();
        });
    }

    var form = $(".js-form-track-resi-home");
    form.validate({
        onkeyup: false,
        onfocusout: false,
        rules:{
            resi: {
                required: true,
            },
        },
        messages: {
            resi: {
                required: form.find(".js-track-resi-field").data("message-required"),
            }
        },
        errorClass: "error",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    _button.on('click',function (e) {
        e.preventDefault();
        form.submit();
        if(form.valid()){
            _button.LoadingOverlay("show");
        }
    });


    var cekHargaForm = $('.js-check-harga');
    var url = cekHargaForm.data('url');
    $('.js-btn-search-price').on('click',function(){
        var _this = $(this);
        _this.LoadingOverlay("show");
        $.ajax({
            url:'/getPrice',
            data:{
                origin:cekHargaForm.find('.js-select-origin').val(),
                destination:cekHargaForm.find('.js-select-destination').val(),
                isRegularPrice:true,
                isDelivery:false
            },
            success:function(result){
                _this.LoadingOverlay("hide");
                if(result.id){
                    // $.each(result, function (i, item) {
                        $('.js-cek-harga').hide();
                        var template = $(document).find('#js-cek-harga-template').html();
                        var data = {
                            id:result.id,
                            origin: result.origin_location.name + ' , ' + result.origin_location.city.name + ' , ' + result.origin_location.city.province.name,
                            destination : result.destination_location.name + ' , ' + result.destination_location.city.name + ' , ' + result.destination_location.city.province.name,
                            regular_price : result.regular_price.toLocaleString('id-ID')

                        };
                        Mustache.parse(template);
                        var _render = Mustache.render(template, data);
                        var _content = $('.js-content-search-price');
                        $(_render).insertAfter(_content);
                    // });
                }
                else {
                    var template_error = $(document).find('#js-cek-harga-template-error').html();
                    Mustache.parse(template_error);
                    var _render_error = Mustache.render(template_error);
                    var _content_error = $('.js-content-search-price');
                    $(_render_error).insertAfter(_content_error);
                }
            }
        })
    });

    /*
Admin Delivery
 */
    $('.select-location').each(function () {
        var _this = $(this);
        if (_this.data("select2")) _this.select2("destroy");
        _this.select2({
            // allowClear: true,
            // placeholder: "Select",
            width: '100%',
            minimumInputLength: 3,
            /*language: {
                inputTooShort: function(args) {
                    return "Silahkan Masukkan Nama";
                }
            },*/
            ajax: {
                url: _this.data('url'),
                data: function (params) {
                    var query = {
                        q: params.term,
                        page: params.page || 1
                    };
                    return query
                },
                processResults: function (resp) {
                    return {
                        results: $.map(resp, function (item) {
                            return {
                                text: item.name + ' , ' + item.city.name + ' , ' + item.city.province.name,
                                id: item.id
                            }
                        }),
                        pagination: {
                            more: true
                        }
                    };
                },
            }
        });
    });

    var _eqNo = 1;
    var $tbody = $('.js-table-barang').find(".js-table-data-barang");
    var template = $('#js-delivery-barang-template').html();
    Mustache.parse(template);
    $(document).on('click','.btn-add-barang', function () {
        $tbody.find("tr").each(function () {
            _eqNo = $(this).index() + 2;
        });

        var data = {
            "no":_eqNo
        };

        var _newData = Mustache.render(template, data);
        $('.js-table-data-barang').append(_newData);
        pricemask();
        countBarang();

    });

    /* Delivery Page */
    var $form_delivery = $('.form-delivery');
    var cod_check = $('.js-delivery-cod-check');
    var cod_price = $('.js-cod-price');
    var sending_location = $form_delivery.find('.js-sending-location');
    var delivery_location = $form_delivery.find('.js-delivery-location');
    var get_price = $form_delivery.find('.js-get-price');
    var company = $form_delivery.find('.js-company');
    var asuransi = $('.js-select-asuransi');
    var priceRecap = $('.js-price-recap');
    var dimensi = $('.js-dimensi');
    var berat_barang = $('.js-berat-barang');

    var totalPrice = 0;
    var total_berat_kotor = 0;
    var total_volume = 0;
    var ongkos_kirim = 0;
    var biaya_asuransi = 0;
    var total_berat_dikenakan_biaya = 0;
    var berat_per_barang = 0;
    var volume_per_barang = 0;
    var arrBeratDikenakanBiaya = [];
    var button_search_sender = $('.btn-search-sender');
    var button_search_recipient = $('.btn-search-recipient');


    function getDataProfile(_this, isSender){
        var namep = _this.closest('.js-recipient-profile').find('.js-input-recipient').val();
        if(isSender === true){
            namep = _this.closest('.js-sender-profile').find('.js-input-name-sender').val();
        }
        $.ajax({
            url: '/delivery/getDataDelivery',
            data: {
                "isSender" : isSender,
                "name" : namep
            },
            success:function(result){
                if(result){
                    if(isSender === true){
                        _this.closest('.js-form-delivery').find('.js-address-sender').val(result.addressSender);
                        _this.closest('.js-form-delivery').find('.js-phone-sender').val(result.phone_sending_by);
                    } else {
                        _this.closest('.js-form-delivery').find('.js-address-recipient').val(result.addressRecipient);
                        _this.closest('.js-form-delivery').find('.js-phone-recipient').val(result.phone_recipient);
                    }
                } else {
                    if(isSender === true) {
                        _this.closest('.js-form-delivery').find('.js-phone-sender').val('');
                        _this.closest('.js-form-delivery').find('.js-address-sender').val('');
                    } else {
                        _this.closest('.js-form-delivery').find('.js-address-recipient').val('');
                        _this.closest('.js-form-delivery').find('.js-phone-recipient').val('');
                    }
                }
            }
        })
    }

    button_search_sender.on('click',function(e){
        e.preventDefault();
        getDataProfile($(this), true)
    });

    button_search_recipient.on('click',function(e){
        e.preventDefault();
        getDataProfile($(this),false)
    });


    $('.js-stt-delivery').on('keypress',function(){
        var _this = $(this);
    });

    cod_check.on('change',function(){
        if($(this).prop('checked')){
            cod_price.removeAttr('readonly','readonly');
        } else {
            cod_price.attr('readonly','readonly');
        }
    });

    $(document).on('change','.js-company',function () {
        beratDikenakanBiaya(total_volume,total_berat_kotor,berat_per_barang,volume_per_barang)
    });

    get_price.each(function(e){
       var _this = $(this);
        _this.on('change', function(){
            console.log(company.val() ? company.val() : null);
           $.ajax({
               url:'/getPrice',
               data:{
                   origin:sending_location.val(),
                   destination:delivery_location.val(),
                   isRegularPrice:false,
                   isDelivery: true,
                   company: company.val() ? company.val() : null
               },
               success:function(result){
                   if(result.price){
                       ongkos_kirim = result.price;
                       $form_delivery.find('.js-biaya-kirim-label').text(result.price.toLocaleString('id-ID'));
                       $form_delivery.find('.js-sending-price').val(result.price);
                       // $form_delivery.find('.js-biaya-kirim-label').text(result.price.toLocaleString('id-ID'));
                       // totalPrice = totalPrice + result.price;
                   } else {
                       $form_delivery.find('.js-biaya-kirim-label').text(0);
                       $form_delivery.find('.js-js-sending-price').val(0);
                   }
               }
           });

            setTimeout(function () {
                beratDikenakanBiaya(total_volume, total_berat_kotor, berat_per_barang, volume_per_barang)
            },100)

       });
    });

    // priceRecap.each(function () {
    //     var _this = $(this);
    //     _this.on('keyup',function(){
    //        _this.val();
    //     });
    // });


    var arrBerat = [];
    $(document).on('keyup','.js-berat-barang',function() {
        var _this = $(this);
        var _berat = _this.val();
        $('.js-table-data-barang').find('.js-berat-barang').each(function(index) {
            countBarang();
            arrBerat[index] = $(this).val()
        });
        $.each(arrBerat,function () {
            berat_barang += parseInt(this)
        });
        var berat_total = 0;
        $.each(arrBerat,function(){
            berat_total += parseInt(this);
        });
        total_berat_kotor = berat_total;
        berat_per_barang = parseInt(_berat);
        $('.js-total-berat-kotor').text(berat_total);
        $('.js-total-berat-kotor-field').val(berat_total);

        var data_berat_perbarang_dikenakan_biaya = [berat_per_barang,volume_per_barang];
        var beratBiaya = Math.max.apply(Math, data_berat_perbarang_dikenakan_biaya);
        if(_this.closest('.js-row-data-barang').find('.js-berat-barang').val() != '' && _this.closest('.js-row-data-barang').find('.js-berat-biaya-per-barang').val() != '') {
            _this.closest('.js-row-data-barang').find('.js-berat-biaya-per-barang').val(beratBiaya);
        }
        beratDikenakanBiaya(total_volume,total_berat_kotor, berat_per_barang, volume_per_barang);
    });


    pricemask();
    function pricemask() {
        var arrVolume = [];
        $form_delivery.find('.js-dimensi').each(function () {
            var $this = $(this);
            $this.inputmask("999 x 999 x 999", {
                "oncomplete": function () {
                    var _this = $(this);
                    var value = _this.val().split("x");
                    var volume = 1;
                    $.each(value,function(){
                        volume = volume*this;
                    });
                    volume = volume/6000;
                    _this.closest('.js-row-data-barang').find('.js-volume').text(volume);
                    _this.closest('.js-row-data-barang').find('.js-volume-field').val(volume);
                    countBarang();

                    $('.js-table-data-barang').find('.js-volume-field').each(function(index) {
                        arrVolume[index] = $(this).val();
                    });

                    var volumeTotal = 0;
                    $.each(arrVolume,function () {
                        volumeTotal += parseFloat(this)
                    });

                    $('.js-total-berat-dimensi').text(volumeTotal);
                    $('.js-total-berat-dimensi-field').val(volumeTotal);
                    total_volume = volumeTotal;
                    volume_per_barang = volume;

                    var data_berat_perbarang_dikenakan_biaya = [berat_per_barang,volume_per_barang];
                    var beratBiaya = Math.max.apply(Math, data_berat_perbarang_dikenakan_biaya);
                    _this.closest('.js-row-data-barang').find('.js-berat-biaya-per-barang').val(beratBiaya);
                    beratDikenakanBiaya(total_volume,total_berat_kotor, berat_per_barang, volume_per_barang)
                }
            });
        });
    }

    function countBarang(){
        var _val = $('.js-row-data-barang').length;
        $form_delivery.find('.js-total-barang-label').text(_val);
        $form_delivery.find('.js-total-barang-field').val(_val);
    }

    asuransi.on('change',function(){
        var _value = $(this).find(":selected").val();
        console.log(totalPrice);
        beratDikenakanBiaya(total_volume, total_berat_kotor, berat_per_barang, volume_per_barang)
    });

    function biayaAsuransi(_value){
        if(_value === 'BASIC'){
            if(ongkos_kirim === 0){
                ongkos_kirim = $('.js-sending-price').val();
            }
            // if(totalPrice === 0){
            //     var total_biaya_berat_edit = 0;
            //     $('.js-table-barang').find('.js-row-data-barang').each(function () {
            //         total_biaya_berat_edit += parseFloat($(this).find('.js-berat-biaya-per-barang').val());
            //     });
            //     var total_harga_edit = total_biaya_berat_edit * ongkos_kirim;
            //     var ppn_edit = ongkos_kirim * (1/100);
            //     totalPrice = total_harga_edit + biaya_asuransi_edit + ppn_edit;
            //     totalPrice = $('.total-harga-field').val() + $('.js-asuransi-price').val() + $('.js-pajak-price').val() ;
            // }
            biaya_asuransi = ongkos_kirim * (0.2/100);
        } else {
            biaya_asuransi = 0;
        }
    }

    function beratDikenakanBiaya(volume,berat,beratPerBarang,volumePerBarang){
        var _asuransiValue = $('.js-select-asuransi').find(":selected").val();
        var data = [volume,berat];
        var total_biaya_berat = 0;
        $('.js-table-barang').find('.js-row-data-barang').each(function () {
            total_biaya_berat += parseFloat($(this).find('.js-berat-biaya-per-barang').val());
        });
        // console.log(total_biaya_berat);
        var total_harga = total_biaya_berat * ongkos_kirim;
        var ppn = ongkos_kirim * (1/100);
        totalPrice = total_harga + biaya_asuransi + ppn;

        $('.js-total-berat-dikenakan-biaya').text(total_biaya_berat.toLocaleString('id-ID'));

        biayaAsuransi(_asuransiValue);
        $form_delivery.find('.js-biaya-asuransi-label').text(biaya_asuransi.toLocaleString('id-ID'));
        $form_delivery.find('.js-asuransi-price').val(biaya_asuransi);

        $('.js-biaya-pajak-label').text(ppn.toLocaleString('id-ID'));
        $('.js-pajak-price').val(ppn);

        $('.total-harga').text(totalPrice.toLocaleString('id-ID'));
        $('.total-harga-field').val(totalPrice);
    }

    $('.js-submit-booking').each(function() {
        var _this = $(this);
        _this.on('click', function (e) {
            e.preventDefault();
            // var _url = '/admin/delivery?print_resi=false&';
            var _url = _this.data('url');
            if ($(this).attr('data-print') == 'true') {
                // _url = '/admin/delivery?print_resi=true&';
                $form_delivery.attr('target','_blank');

                setTimeout(function () {
                    window.location.replace($form_delivery.data('url-redirect'))
                },10);

            }
            $(this).closest('.form-delivery').attr('action', _url);
            _this.closest('.form-delivery').submit();
        });
    });

    /* Delivery List */
    $('.js-check-delivery').on('change', function(){
        var $selectedItems = $(".js-check-delivery:checked");
        var _exportUrl = $('.js-export-delivery').attr('href');
        if ($selectedItems.length > 0) {
            // Export Link
            $selectedItems.each(function () {
                if (!_exportUrl.endsWith("?")) _exportUrl += "&";
                _exportUrl += "id=" + $(this).data('id');
            });
        }
        $('.js-export-delivery').attr('href',_exportUrl)
    });

    var startDate = null;
    var endDate = null;
    var url = '/admin/delivery/export';
    var _form_list_delivery = $('.js-delivery-list-form');

    $('#datepicker').daterangepicker({
        minyear:2011,
    },function (start, end, label) {
        startDate = start.format('YYYY-MM-DD');
        endDate = end.format('YYYY-MM-DD');
    });

    $('#datepicker').on('apply.daterangepicker',function(){
        // $('.js-export-delivery').attr('href',url + '?startDate='+startDate + '&endDate=' + endDate);
        _form_list_delivery.find('.js-start-date').val(startDate);
        _form_list_delivery.find('.js-end-date').val(endDate);
    });

    $('.js-export-delivery').on('click', function(){
       _form_list_delivery.preventDefault();
    });

    // $('.js-export-button').on('click',function(){
    //     $(this).closest('.js-export-delivery').preventDefault();
    //
    //     $(this).closest('.js-export-delivery').submit();
    // })


    function formatText (icon){
        return $('<span><i class="fa ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
    };

    $('.select2-icon').select2({
        templateSelection: formatText,
        templateResult: formatText
    });

});

