<?php $__env->startSection('main_content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Table Booking</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a href="/delivery/create"> <button class="btn btn-primary">Booking</button></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <form action="/delivery" method="get">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="input-group">
                    <input type="text" value="<?php echo e(request('no')); ?>" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                </div>
            </div>
        </form>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th>
                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </th>
                        <th class="column-title">Nomor Invoice </th>
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
                        <tr class="odd pointer">
                            <td class="a-center ">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            </td>
                            <td class="col-sm-2 a-right a-right ">
                                <a href="delivery/<?php echo e($d->id); ?>"><?php echo e($d->invoice); ?></a>
                            </td>
                            <td class="col-sm-1"><?php echo e($d->stt); ?></td>
                            <td class="col-sm-3"><?php echo e($d->noReferensiExternal); ?></td>
                            <td class="col-sm-3"><?php echo e($d->sending_by); ?></td>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/delivery/list.blade.php ENDPATH**/ ?>