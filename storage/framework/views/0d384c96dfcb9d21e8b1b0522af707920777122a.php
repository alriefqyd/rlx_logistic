<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate="" novalidate="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label>Nama Layanan</label>
                    <input type="text" value="<?php echo e($layanan->name); ?>" id="" class="form-control mb-3" name="name" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Code Layanan :</label>
                    <input type="text" id="" value="<?php echo e($layanan->code); ?>" class="form-control mb-3" name="code" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Harga :</label>
                    <input type="text" id="" value="<?php echo e($layanan->price); ?>" class="form-control mb-3" name="price" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" rows="4" placeholder="Deskripsi">
                        <?php echo e($layanan->description); ?>

                    </textarea>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                        <option>Pilih Lokasi</option>
                        <?php if($layanan->origin): ?>
                            <option selected="selected" value="<?php echo e($layanan->origin); ?>"><?php echo e($layanan->cityOrigin->getFullLocation()); ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
                        <option>Pilih Lokasi</option>
                        <?php if($layanan->destination): ?>
                            <option selected="selected" value="<?php echo e($layanan->destination); ?>"><?php echo e($layanan->cityDestination->getFullLocation()); ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/layanan/detail.blade.php ENDPATH**/ ?>