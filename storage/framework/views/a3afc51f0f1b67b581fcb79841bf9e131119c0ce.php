<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail</h2>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php if($page): ?>
        <form method="post" action="/admin/page/home/" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php if($slider): ?>
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Slider</h4>
                    <?php for($i = 0; $i<count($slider); $i++): ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title <?php echo e($i+1); ?></label>
                                <input class="form-control" type="text" name="sliderTitle[]" value=" <?php echo e($slider[$i]['title']); ?>"/>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title <?php echo e($i+1); ?></label>
                                <input class="form-control" type="text" name="sliderSubtitle[]" value="<?php echo e($slider[$i]['subTitle']); ?>"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label for="image">Image Slider <?php echo e($i+1); ?></label>
                                <?php echo e($slider[$i]['image']); ?>

                                <input class="form-control" type="file" id="image" name="sliderImage[]" value="<?php echo e($slider[$i]['image']); ?>"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
            <?php if($service): ?>
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Service</h4>
                    <?php for($j = 0; $j<count($service); $j++): ?>
                        <?php if(array_key_exists('title', $service[$j])): ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title</label>
                                    <input class="form-control" type="text" name="serviceTitle" value=" <?php echo e($service[$j]['title']); ?>"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Icon <?php echo e($j); ?></label>
                                <select name="serviceIcon[]" class="form-control select2-icon">
                                    <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($key == $service[$j]['icon'] ? 'selected' : ''); ?> data-icon="<?php echo e($key); ?>">
                                            <i class="<?php echo e($key); ?> text-primary fa-3x flex-shrink-0"></i>
                                            <?php echo e($value); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title <?php echo e($j); ?></label>
                                <input class="form-control" type="text" name="serviceSubtitle[]" value=" <?php echo e($service[$j]['subTitle']); ?>"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Description <?php echo e($j); ?></label>
                                <input class="form-control" type="text" name="serviceDescription[]" value=" <?php echo e($service[$j]['description']); ?>"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
            <?php if($whyus): ?>
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Why Us</h4>
                    <?php for($k = 0; $k<count($whyus); $k++): ?>
                        <?php if(array_key_exists('title', $whyus[$k])): ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="whyusTitle" value=" <?php echo e($whyus[$k]['title']); ?>"/>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Icon <?php echo e($k); ?></label>
                                    <select name="whyusIcon[]" class="form-control select2-icon">
                                        <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e($key == $whyus[$k]['icon'] ? 'selected' : ''); ?> data-icon="<?php echo e($key); ?>">
                                                <i class="<?php echo e($key); ?> text-primary fa-3x flex-shrink-0"></i>
                                                <?php echo e($value); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Sub Title <?php echo e($k); ?></label>
                                    <input class="form-control" type="text" name="whyusSubtitle[]" value=" <?php echo e($whyus[$k]['subTitle']); ?>"/>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Description <?php echo e($k); ?></label>
                                    <input class="form-control" type="text" name="whyusDescription[]" value=" <?php echo e($whyus[$k]['description']); ?>"/>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
            <div class="x_panel">
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/page/detail.blade.php ENDPATH**/ ?>