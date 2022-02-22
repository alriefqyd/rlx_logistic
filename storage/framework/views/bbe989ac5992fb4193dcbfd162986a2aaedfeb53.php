<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12 js-delivery-list">
    <div class="x_panel">
        <div class="x_title">
            <h2>Table Booking</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a href="/admin/delivery/create"> <button class="btn btn-primary">Booking</button></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <form class="js-delivery-list-form" action="/admin/delivery" method="get">
            <div class="col-md-5 col-sm-12 col-xs-12">
                    <input type="text" value="<?php echo e(request('no')); ?>" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <fieldset>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                <input autocomplete="off" type="text" id="datepicker" class="form-control js-filter-date"/>
                                <input type="hidden" name="startDate" class="js-start-date">
                                <input type="hidden" name="endDate" class="js-end-date">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                <span class="input-group-btn">
                      <input type="submit" class="btn btn-primary btn-search-delivery" value="Search">
                </span>
            </div>
        </form>
        <form action="/admin/delivery/export" method="get">
            <div class="col-md-2 col-sm-12 col-xs-12">
                <input type="hidden" value="<?php echo e(request('no')); ?>" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
                <input type="hidden" value="<?php echo e(request('startDate')); ?>" name="startDate" class="js-start-date">
                <input type="hidden" name="endDate" value="<?php echo e(request('endDate')); ?>" class="js-end-date">
                <input type="submit" class="btn btn-primary btn-search-delivery" value="Export">
            </div>
        </form>

        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nomor STT </th>
                        <th class="column-title">Nomor Referensi External </th>
                        <th class="column-title">Nama Pengirim </th>
                        <th class="column-title">Dibuat Oleh </th>
                        <th class="column-title">Tanggal pembuatan </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $delivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="even pointer">
                            <td class="col-sm-1"><a href="delivery/<?php echo e($d->id); ?>/edit"><?php echo e($d->stt); ?></a></td>
                            <td class="col-sm-3"><?php echo e($d->noReferensiExternal); ?></td>
                            <td class="col-sm-3"><?php echo e($d->senderName); ?></td>
                            <td class="col-sm-2"><?php echo e($d->createdBy->profile->full_name); ?></td>
                            <td class="col-sm-2"><?php echo e($d->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($delivery->links()); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/delivery/list.blade.php ENDPATH**/ ?>