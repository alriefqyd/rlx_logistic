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
                    <label>Harga</label>
                    <?php if($price->isRegularPrice): ?>
                        <input type="number" value="<?php echo e($price->regular_price); ?>" id="" class="form-control mb-3" name="regular_price" required="">
                    <?php else: ?>
                        <input type="number" value="<?php echo e($price->price); ?>" id="" class="form-control mb-3" name="price" required="">
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                        <option>Pilih Lokasi</option>
                        <?php if($price->origin_location): ?>
                            <option selected="selected" value="<?php echo e($price->origin_location); ?>"><?php echo e($price->originLocation->getFullLocation()); ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
                        <option>Pilih Lokasi</option>
                        <?php if($price->destination_location): ?>
                            <option selected="selected" value="<?php echo e($price->destination_location); ?>"><?php echo e($price->destinationLocation->getFullLocation()); ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <?php if(!$price->isRegularPrice): ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                        <label for="">Company</label>
                        <select class="select2 select-search form-control" name="company">
                            <option>Pilih Lokasi</option>
                            <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($c->id == $price->company ? 'selected="selected"' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->profile->company_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/price/detail.blade.php ENDPATH**/ ?>