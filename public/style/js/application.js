'use strict';
$(function() {
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
});