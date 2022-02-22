<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <?php if($errors->any()): ?>
                <div class = "alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="/admin/layanan" method="post" id="demo-form" data-parsley-validate="" novalidate="">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label>Nama Layanan</label>
                    <input type="text" value="<?php echo e(old('name')); ?>" id="" class="form-control mb-3" name="name" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Code Layanan :</label>
                    <input type="text" id="" value="<?php echo e(old('code')); ?>" class="form-control mb-3" name="code" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Harga :</label>
                    <input type="text" id="" value="<?php echo e(old('price')); ?>" class="form-control mb-3" name="price" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Deskripsi">
                        <?php echo e(old('description')); ?>

                    </textarea>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
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



<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/layanan/create.blade.php ENDPATH**/ ?>