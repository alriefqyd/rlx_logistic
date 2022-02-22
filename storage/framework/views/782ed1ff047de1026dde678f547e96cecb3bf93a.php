<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail</h2>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php if($page): ?>
    <div class="x_panel">
        <!-- start form for validation -->
        <form id="demo-form" data-parsley-validate="" novalidate="">
            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                <label>Judul</label>
                <input class="form-control" type="text" name="title[]"/>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-5">
                <label>Sub Judul</label>
                <input class="form-control" type="text" value="<?php echo e($page->title); ?>" name="subtitle[]"/>
            </div>
            <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                    <label>Content <?php echo e($val['order']); ?></label>
                    <textarea class="summernote" name="content"><?php echo e($val['content']); ?></textarea>
                </div>
                <?php if($val['point1']): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                        <label>Poin 1</label>
                        <input class="form-control" type="text" value="<?php echo e($val['point1']); ?>" name="poin1"/>
                    </div>
                <?php endif; ?>
                <?php if($val['point2']): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                        <label>Poin 2</label>
                        <input class="form-control" type="text" value="<?php echo e($val['point2']); ?>" name="poin2"/>
                    </div>
                <?php endif; ?>
                <?php if($val['point2']): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                        <label>Poin 3</label>
                        <input class="form-control" type="text" value="<?php echo e($val['point3']); ?>" name="poin3"/>
                    </div>
                <?php endif; ?>
                <?php if($val['point4']): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                        <label>Poin 4</label>
                        <input class="form-control" type="text" name="poin4" value="<?php echo e($val['point4']); ?>"/>
                    </div>
                <?php endif; ?>
                <?php if($val['image']): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-5">
                        <label>Picture</label>
                        <input class="form-control" type="file" name="image" value="<?php echo e($val['image']); ?>"/>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>
        <!-- end form for validations -->
    </div>
        <div class="x_panel">
        <button class="btn btn-danger" type="cancel">Cancel</button>
        <button class="btn btn-success" type="submit">Update</button>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/page/detail.blade.php ENDPATH**/ ?>