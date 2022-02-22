<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            <?php if($errors->any()): ?>
                <div class = "alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- start form for validation -->
            <form action="/admin/prices/<?php echo e($url); ?>/<?php echo e($price->id); ?>" method="post" id="demo-form" data-parsley-validate="" novalidate="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php echo $__env->make('admin.price.form',[
                    'isRegular' => $isRegularPrice,
                    'price' => $price,
                    'layanans' => $layanan,
                    'isEdit' => true
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/price/detail.blade.php ENDPATH**/ ?>