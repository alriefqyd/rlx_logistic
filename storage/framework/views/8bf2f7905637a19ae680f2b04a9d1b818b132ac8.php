<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Harga</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="/admin/prices/regular/create"> <button class="btn btn-primary">Tambah</button></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <form action="/admin/prices/regular" method="get">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <select name="origin" class="form-control select2" data-placeholder="Asal Pengiriman">
                            <option value="">Pilih Asal Pengiriman</option>
                            <?php $__currentLoopData = $origin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(request('origin') == $o[0]->origin_location ? 'selected="selected"' : ''); ?> value="<?php echo e($o[0]->origin_location); ?>"><?php echo e($o[0]->originLocation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <select name="destination" class="form-control select2" data-placeholder="Tujuan Pengiriman">
                            <option value="">Pilih Tujuan Pengiriman</option>
                            <?php $__currentLoopData = $destination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(request('destination') == $d[0]->destination_location ? 'selected="selected"' : ''); ?> value="<?php echo e($d[0]->destination_location); ?>"><?php echo e($d[0]->destinationLocation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Search</button>
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
                            <th class="column-title">Harga Reguler </th>
                            <th class="column-title">Lokasi Pengiriman </th>
                            <th class="column-title">Lokasi Tujuan Pengiriman </th>
                            <th class="column-title">Dibuat Oleh </th>
                            <th class="column-title">Tanggal pembuatan </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </td>
                                <td class="col-sm-1">Rp <?php echo e(number_format($d->regular_price, 0)); ?></td>
                                <td class="col-sm-3"><?php echo e($d->originLocation->getFullLocation()); ?></td>
                                <td class="col-sm-3"><?php echo e($d->destinationLocation->getFullLocation()); ?></td>
                                <td class="col-sm-2"><?php echo e($d->createdBy->profile->full_name); ?></td>
                                <td class="col-sm-2"><?php echo e($d->created_at); ?></td>
                                <td class="col-sm-2 a-right a-right ">
                                    <a href="/admin/prices/regular/<?php echo e($d->id); ?>">Detail</a>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($data->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/price/list.blade.php ENDPATH**/ ?>