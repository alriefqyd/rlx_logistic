<div class="col-md-12 col-sm-12 col-xs-12">
    <label>Nama Layanan</label>
    <input type="text" value="<?php echo e(old('name') ?: $layanan->name); ?>" id="" class="form-control mb-3" name="name" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <label for="">Code Layanan :</label>
    <input type="text" id="" value="<?php echo e(old('code') ?: $layanan->code); ?>" class="form-control mb-3" name="code" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <label for="">Harga :</label>
    <input type="text" id="" value="<?php echo e(old('price') ?: $layanan->price); ?>" class="form-control mb-3" name="price" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12 mb-3">
    <label for="">Deskripsi</label>
    <textarea class="form-control" name="description" rows="4" placeholder="Deskripsi"><?php echo e(old('description') ?: $layanan->description); ?></textarea>
</div>


















<?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/layanan/form.blade.php ENDPATH**/ ?>