<div class="col-md-6 col-sm-12 col-xs-12 mb-3 <?php $__errorArgs = ['origin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <label for="">Lokasi Pengiriman</label>
    <select class="select2 select-location form-control"
            data-rule-isLocationExist="true"
            data-url="/getLocation"
            name="origin">
        <?php if($isEdit): ?>
            <option selected="selected" value="<?php echo e($price->origin_location); ?>"><?php echo e($price->originLocation->getFullLocation()); ?></option>
        <?php endif; ?>
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
        <?php if($isEdit): ?>
            <option selected="selected" value="<?php echo e($price->destination_location); ?>"><?php echo e($price->destinationLocation->getFullLocation()); ?></option>
        <?php endif; ?>
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
            <?php if($isEdit): ?>
                <option value="<?php echo e($price->company); ?>"><?php echo e($price->companyBy->profile->company_name); ?></option>
            <?php else: ?>
                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>" <?php echo e((collect(old('company'))->contains($c->id))
                        || $c->id == $corporateId ? 'selected="selected"':''); ?>>
                        <?php echo e($c->profile->company_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
<?php endif; ?>
<div class="col-md-12 col-sm-12 col-xs-12 mb-2 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <label><?php echo e(isset($price->regular_price) ? 'Regular' : ''); ?> Price</label>
    <span class="label label-danger"></span>
    <?php if($isEdit && $price->isRegularPrice): ?>
        <input type="number" value="<?php echo e($isEdit ? $price->regular_price : old('regular_price')); ?>" id="" class="form-control mb-3" name="regular_price" required="">
    <?php else: ?>
        <input type="number" value="<?php echo e($isEdit ? $price->price : old('company_price')); ?>" id="" class="form-control mb-3" name="company_price" required="">
    <?php endif; ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 mb-5 <?php $__errorArgs = ['layanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> bad <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <label>Layanan</label>
    <span class="label label-danger"></span>
    <select name="layanan" class="form-control">
        <?php $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php echo e((collect(old('layanan'))->contains($layanan->id))
                        || $layanan->id == $price->layanan ? 'selected="selected"':''); ?>

                    value="<?php echo e($layanan->id); ?>"><?php echo e($layanan->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/price/form.blade.php ENDPATH**/ ?>