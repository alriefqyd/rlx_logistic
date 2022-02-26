<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail</h2>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php if($page): ?>
        <form method="post" action="/admin/page/home/">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php if($slider): ?>
                <div class="x_panel">
                    <label>Slider</label>
                    <?php for($i = 0; $i<count($slider); $i++): ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title <?php echo e($i+1); ?></label>
                                <input class="form-control" type="text" name="sliderTitle[]" value=" <?php echo e($slider[$i]['title']); ?>"/>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title <?php echo e($i+1); ?></label>
                                <input class="form-control" type="text" name="sliderSubtitle[]" value=" <?php echo e($slider[$i]['subTitle']); ?>"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Image Slider <?php echo e($i+1); ?></label>
                                <input class="form-control" type="file" name="sliderImage[]" value=" <?php echo e($slider[$i]['image']); ?>"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
            <?php if($service): ?>
                <div class="x_panel">
                    <label>Slider</label>
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
                                <input class="form-control" type="text" name="serviceIcon[]" value=" <?php echo e($service[$j]['icon']); ?>"/>
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
                    <label>Slider</label>
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
                                    <input class="form-control" type="text" name="whyusIcon[]" value=" <?php echo e($whyus[$k]['icon']); ?>"/>
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
















































        <!-- end form for validations -->


</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/page/detail.blade.php ENDPATH**/ ?>