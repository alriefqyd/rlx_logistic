<?php $__env->startSection('main_content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Booking</h2>
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

            <form action="/delivery" method="post" id="demo-form" data-url-redirect="<?php echo e(URL::to('/delivery')); ?>" data-parsley-validate="" class="form-delivery" novalidate="">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 col-sm-12 col-xs12">
                    <label for="">Nomor Invoice</label>
                    <input autofocus type="text" value="<?php echo e(old('invoice')); ?>" id="" class="form-control mb-3" name="invoice" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Nomor STT :</label>
                    <input type="text" value="<?php echo e(old('stt')); ?>" id="" class="form-control mb-3" name="stt" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Nomor Referensi External :</label>
                    <input type="text" id="" value="<?php echo e(old('noReferensiExternal')); ?>" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-5">
                    <label for="">Layanan Pengiriman</label>
                    <select class="select2 form-control" name="layanan">
                        <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e((collect(old('layanan'))->contains($layanan->id)) ? 'selected="selected"':''); ?> value="<?php echo e($layanan->id); ?>"><?php echo e($layanan->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Corporate</label>
                    <select class="select2 js-company js-total-price form-control js-get-price" name="company_sender">
                        <option value="" disabled selected>Pilih Corporate</option>
                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->id); ?>" <?php echo e((collect(old('company_sender'))->contains($c->id))
                         ? 'selected="selected"':''); ?>>
                                <?php echo e($c->profile->company_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select-location js-total-price js-sending-location js-get-price form-control" data-price-url="/getPrice" data-url="/getLocation" name="origin">
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location js-total-price js-delivery-location js-get-price form-control" data-price-url="/getPrice" data-url="/getLocation" name="destination">
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Nama Pengirim</label>
                    <div class="input-group">
                        <input type="text" value="<?php echo e(old('senderName')); ?>" name="senderName" placeholder="" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Nama Penerima</label>
                    <div class="input-group">
                        <input type="text" value="<?php echo e(old('recipientName')); ?>" name="recipientName" placeholder="" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Alamat Pengirim</label>
                    <textarea class="form-control" rows="4" name="addressSender" placeholder="Alamat Pengirim">
                        <?php echo e(old('addressSender')); ?>

                    </textarea>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Alamat Penerima</label>
                    <textarea class="form-control" name="addressRecipient" rows="4" placeholder="Alamat Penerima">
                        <?php echo e(old('addressRecipient')); ?>

                    </textarea>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                    <label>Nomor Telpon Pengirim :</label>
                    <input type="text" value="<?php echo e(old('phone_sending_by')); ?>" id="" class="form-control " name="phone_sending_by" required="">
                </div>
                <div class="col-md-3 col-lg-offset-3 col-sm-12 col-xs-12 mb-5">
                    <label>Nomor Telpon Penerima :</label>
                    <input type="text" id="" value="<?php echo e(old('phone_recipient')); ?>" class="form-control mb-3" name="phone_recipient" required="">
                </div>
                <div class="col-md-12">
                    <label for="fullname">Detail Barang</label>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-5">
                    <label>Tipe Komoditas :  </label>
                    <select class="select2 form-control js-select-comodity" name="komoditas">
                        <?php $__currentLoopData = $komoditas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c['key']); ?>"><?php echo e($c['value']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>Asuransi Pengiriman :</label>
                    <select name="asuransi_pengiriman" class="form-control js-total-price js-select-asuransi">
                        <?php $__currentLoopData = $asuransi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>"><?php echo e(ucwords(strtolower($value))); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>Estimasi Harga Barang :</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                              <div class="btn btnx-default">Rp</div>
                        </span>
                        <input type="text" name="harga" class="form-control" value="<?php echo e(old('harga')); ?>">
                    </div>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>No Registrasi Pajak :</label>
                    <input type="text" id="" value="<?php echo e(old('npwp')); ?>" class="form-control mb-3" name="npwp" required="">
                </div>

                <div class="col-xs-12 col-sm-12 col-lg-12 table">
                    <table class="table table-striped js-table-barang">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Berat Aktual Barang</th>
                            <th>Dimensi</th>
                            <th>Berat Volume</th>
                        </tr>
                        </thead>
                        <tbody class="js-table-data-barang">
                        <tr class="js-row-data-barang">
                            <td>1</td>
                            <td><input type="text" width="" name="berat_barang[]" class="form-control js-berat-barang js-total-price js-price-recap" value="<?php echo e(old('berat_barang[]')); ?>"></td>
                            <td>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <input type="text" name="dimensi[]" class="form-control js-total-price js-price-recap js-dimensi" value="<?php echo e(old('dimensi[]')); ?>">
                                        <input type="hidden" name="berat_volume[]" class="form-control js-total-price js-price-recap js-volume-field" value="<?php echo e(old('berat_volume[]')); ?>">
                                        <input type="hidden" name="berat_biaya[]" class="form-control js-berat-biaya-per-barang">
                                        <span class="satuan-berat-volume form-control-feedback right" aria-hidden="true">cm</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="js-volume">0</span> Kg</td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn-add-barang"><i class="fa fa-plus-circle"></i> Tambah Barang</a>
                </div>

                <div class="row mb-5">
                    <!-- /.col -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="table-responsive table-detail-booking">
                            <div class="col-md-3">
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">Total Barang:</th>
                                    <td class="js-total-barang-label">1</td>
                                    <input type="hidden" class="js-total-barang-field" name="total_packet">
                                </tr>
                                <tr>
                                    <th>Total Berat Kotor</th>
                                    <td><span class="js-total-berat-kotor">0 </span> Kg</td>
                                    <input type="hidden" class="js-total-berat-kotor-field" name="actual_weight">
                                </tr>
                                <tr>
                                    <th>Total Berat Volume:</th>
                                    <td><span class="js-total-berat-dimensi">0 </span> Kg</td>
                                    <input type="hidden" class="js-total-berat-dimensi-field" name="dimension_weight">
                                </tr>
                                <tr>
                                    <th>Berat Dikenakan Biaya:</th>
                                    <td><span class="js-total-berat-dikenakan-biaya">0 </span> Kg</td>
                                </tr>
                                <tr>
                                    <th>Total Harga:</th>
                                    <td>Rp <span class="total-harga"> 0</span></td>
                                    <input type="hidden" class="total-harga-field" name="total_price">
                                </tr>
                                <tr>
                                    <th style="width:50%">Biaya Kirim</th>
                                    <td class="">Rp <span class="js-biaya-kirim-label"></span>
                                        <input type="hidden" class="js-sending-price" name="sending_price">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Biaya Asuransi</th>
                                    <td class="">Rp <span class="js-biaya-asuransi-label"> 0</span>
                                        <input type="hidden" class="js-asuransi-price" name="insurance">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:50%">PPN 1%</th>
                                    <td class="">Rp <span class="js-biaya-pajak-label"></span>
                                        <input type="hidden" class="js-pajak-price" name="ppn">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <hr>
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle" type="button" aria-expanded="false">Cancel</span>
                    </button>
                </div>
                <div class="btn-group">
                    <button data-toggle="dropdown" class="js-btn-submit-booking btn btn-success dropdown-toggle" type="button" aria-expanded="true">Booking <span class="caret"></span>
                    </button>
                    <ul role="menu" class="js-list-booking-submit dropdown-menu">
                        <li class="js-submit-booking" data-print="true"><a href="#">Booking dan Print Resi</a>
                        </li>
                        <li class="js-submit-booking" data-print="false"><a href="#">Booking tanpa Resi</a>
                        </li>
                    </ul>
                </div>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/delivery/create.blade.php ENDPATH**/ ?>