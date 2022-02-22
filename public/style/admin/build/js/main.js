$(function() {
    $('.summernote').each(function(e){
        $(this).summernote({
            tabsize: 2,
            height: 100
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.dual-list').bootstrapDualListbox({
        // see next for specifications
    });

    $('.select2').select2();
    $('.select2').select2({
        allowClear: true,
        placeholder: 'Silahkan Pilih'
    });

});
