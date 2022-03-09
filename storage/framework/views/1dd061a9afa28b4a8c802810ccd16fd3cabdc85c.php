<script id="js-delivery-barang-template" type="x-tmpl-mustache">
    <tr class="js-row-data-barang">
        <td>{{no}}</td>
        <td><input type="text" width="" name="berat_barang[]" class="form-control js-price-recap js-berat-barang js-total-price" value="<?php echo e(old('berat_barang[]')); ?>"></td>
        <td>
            <div class="form-group">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <input type="text" name="dimensi[]" class="form-control js-price-recap js-dimensi js-total-price" value="<?php echo e(old('dimensi[]')); ?>">
                    <input type="hidden" name="berat_volume[]" class="form-control js-price-recap js-volume-field" value="<?php echo e(old('berat_volume[]')); ?>">
                    <span class="satuan-berat-volume form-control-feedback right" aria-hidden="true">cm</span>
                    <input type="hidden" class="form-control js-berat-biaya-per-barang">
                </div>
            </div>
        </td>
        <td><span class="js-volume">0</span> Kg</td>
    </tr>
</script>
<?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/delivery/mustache.blade.php ENDPATH**/ ?>