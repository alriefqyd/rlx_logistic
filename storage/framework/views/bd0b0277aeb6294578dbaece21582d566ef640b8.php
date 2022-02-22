<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
        <div class="x_title">
            <h2>Table Price <?php echo e($isRoleCorporate ? $companyUser->profile->company_name : ''); ?></h2>
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

        <form method="post" class="js-price-form" action="/admin/prices/<?php echo e($formUrl); ?>/store" id="demo-form" data-parsley-validate="" novalidate="">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('admin.price.form',[
                'layanans' => $layanans,
                'isRoleCorporate' => $isRoleCorporate,
                'isEdit' => false,
                'price' => $price
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <button class="btn btn-danger" type="cancel">Cancel</button>
            <button class="btn btn-success js-submit-price" type="submit">Update</button>
        </form>
        <!-- end form for validations -->
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/price/create.blade.php ENDPATH**/ ?>