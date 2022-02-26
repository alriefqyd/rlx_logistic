<?php $__env->startSection('main_content'); ?>
    <div class="main_content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Table Harga</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="/admin/prices/corporate/create"> <button class="btn btn-primary">Tambah</button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <form action="/admin/prices/corporate" method="get">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <select name="company" class="form-control select2">
                                    <option value="" >Pilih Corporate</option>
                                    <?php $__currentLoopData = $companyFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(request('company') == $c[0]->company ? 'selected="selected"' : ''); ?> value="<?php echo e($c[0]->company); ?>"><?php echo e($c[0]->companyBy->profile->company_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <select name="origin" class="form-control select2">
                                    <option value="">Pilih Asal Pengiriman</option>
                                    <?php $__currentLoopData = $origin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(request('origin') == $o[0]->origin_location ? 'selected="selected"' : ''); ?> value="<?php echo e($o[0]->origin_location); ?>"><?php echo e($o[0]->originLocation->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <select name="destination" class="form-control select2">
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
                                    <th class="column-title">Corporate </th>
                                    <th class="column-title">Harga Corporate </th>
                                    <th class="column-title">Harga Regular </th>
                                    <th class="column-title">Lokasi Pengiriman </th>
                                    <th class="column-title">Lokasi Tujuan </th>
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
                                <?php $__currentLoopData = $corporatePriceList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd pointer">
                                        <td class="a-center ">
                                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </td>
                                        <td class="col-sm-2"><?php echo e($d->companyBy->profile->company_name); ?></td>
                                        <td class="col-sm-2">Rp <?php echo e(number_format($d->price, 0)); ?></td>
                                        <td class="col-sm-2">Rp <?php echo e(number_format($d->getRegularPrice(), 0)); ?></td>
                                        <td class="col-sm-3"><?php echo e($d->originLocation->getFullLocation()); ?></td>
                                        <td class="col-sm-3"><?php echo e($d->destinationLocation->getFullLocation()); ?></td>
                                        <td class="col-sm-2"><?php echo e($d->createdBy->profile->full_name); ?></td>
                                        <td class="col-sm-1"><?php echo e($d->created_at); ?></td>
                                        <td class="col-sm-1 a-right a-right ">
                                            <a href="/admin/prices/corporate/<?php echo e($d->id); ?>">Edit</a> |
                                            <a href="/admin/prices/corporate/edit/<?php echo e($d->id); ?>">Delete</a>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo e($corporatePriceList->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/rlx_logistic/resources/views/admin/price/corporateList.blade.php ENDPATH**/ ?>