<!-- page content -->

<?php $__env->startSection('main_content'); ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cek Resi</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lacak Pengiriman</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $__env->make('admin.layouts.formTrackResi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="track-error">
                            <?php if(!$invoice): ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error</strong> Data Tidak ditemukan. Pastikan No Resi yang dimasukkan benar
                            </div>
                            <?php else: ?>
                            <div class="title col-sm-12 col-md-12 col-xs-12">
                                <div class="col-md-12 col-sm-12" style="font-size: 18px;">
                                    <div class="col-md-12 text-center">Status : <?php echo e($status); ?></div>






                                </div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-md-xs-12">
                                    <div class="pricing_features" style="height: auto;">
                                        <!-- <div class="col-md-12"> -->
                                        <ul class="cbp_tmtimeline">
                                            <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $his): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>








                                            <li>
                                                <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span><?php echo e($his['date']); ?></span></time>
                                                <div class="cbp_tmicon <?php echo e($loop->first || $loop->last ? 'bg-blush' : 'bg-white'); ?>">
                                                    <i class="<?php echo e($loop->first ? 'fas fa-clipboard-check' : ''); ?>

                                                        <?php echo e($loop->last ? "fas fa-box" : ''); ?>

                                                        <?php echo e(!$loop->first && !$loop->last ? 'fas fa-truck text-primary' : ''); ?>"
                                                        <?php echo e($loop->first || $loop->last ? "style=color:white" : ""); ?>></i></div>
                                                <div class="cbp_tmlabel">
                                                    <p class="text-primary"><?php echo e($his['desc']); ?></p>
                                                </div>
                                            </li>




























                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<!-- /page content -->

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/track/detail.blade.php ENDPATH**/ ?>