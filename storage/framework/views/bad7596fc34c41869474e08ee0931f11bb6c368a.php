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

        <form method="post" action="/prices/<?php echo e($formUrl); ?>/store" id="demo-form" data-parsley-validate="" novalidate="">
            <?php echo csrf_field(); ?>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3 <?php $__errorArgs = ['origin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="">Lokasi Pengiriman</label>
                <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                </select>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 mb-3 <?php $__errorArgs = ['destination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
                </select>
            </div>
            <?php if(!$isRegular && !$isRoleCorporate): ?>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-3 <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="">Company</label>
                <select class="select2 form-control" name="company">
                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>" <?php echo e((collect(old('company'))->contains($c->id))
                        || $c->id == $corporateId ? 'selected="selected"':''); ?>>
                            <?php echo e($c->profile->company_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-5 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label>Regular Price</label>
                <span class="label label-danger"></span>
                <input type="text" value="<?php echo e(old('price')); ?>" id="" class="form-control mb-3" name="price" required="">
            </div>
            <button class="btn btn-danger" type="cancel">Cancel</button>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
        <!-- end form for validations -->
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/price/create.blade.php ENDPATH**/ ?>