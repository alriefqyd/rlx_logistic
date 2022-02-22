<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <a href="<?php echo e(url('track/?resi=' . $delivery->invoice)); ?>"> <button class="btn btn-primary">Lacak Pengiriman Barang</button></a>
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
            <form action="/admin/delivery/<?php echo e($delivery->id); ?>" method="post" id="demo-form" data-url-redirect="<?php echo e(URL::to('/admin/delivery')); ?>" data-parsley-validate="" class="form-delivery js-form-delivery" novalidate="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <?php echo $__env->make('admin.delivery.form',[
                    'isEdit' => true,
                    'layanan' => $layanan,
                    'company' => $company,
                    'komoditas' => $komoditas,
                    'asuransi' => $asuransi,
                    'delivery' => $delivery,
                    'consignments' => $consignment,
                    'totalBerat' => $totalBerat,
                    'beratVolume' => $beratVolume,
                    'totalPrice' => $totalPrice
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/delivery/edit.blade.php ENDPATH**/ ?>