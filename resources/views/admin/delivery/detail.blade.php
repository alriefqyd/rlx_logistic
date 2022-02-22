@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Booking</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{ url('track/?resi=' . $delivery->invoice) }}"> <button class="btn btn-primary">Lacak Pengiriman Barang</button></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <div class="col-md-12">
                <label for="fullname">Nomor Invoice : {{$delivery->invoice}}</label>
            </div>
            <form id="demo-form" data-parsley-validate="" novalidate="">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Nomor STT :</label>
                    <input type="text" value="{{$delivery->stt}}" id="" class="form-control mb-3" name="stt" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Nomor Referensi External :</label>
                    <input type="text" id="" value="{{$delivery->noReferensiExternal}}" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                        <option>Pilih Lokasi</option>
                        @if($delivery->origin)
                            <option selected="selected" value="{{$delivery->origin}}">{{$delivery->cityOrigin->getFullLocation()}}</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
                        <option>Pilih Lokasi</option>
                        @if($delivery->destination)
                            <option selected="selected" value="{{$delivery->destination}}">{{$delivery->cityDestination->getFullLocation()}}</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Alamat Pengirim</label>
                    <textarea class="form-control" rows="4" placeholder="Alamat Pengirim">
                        {{$delivery->addressSender}}
                    </textarea>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Alamat Penerima</label>
                    <textarea class="form-control" rows="4" placeholder="Alamat Penerima">
                        {{$delivery->addressRecipient}}
                    </textarea>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                    <label>Nomor Telpon Pengirim :</label>
                    <input type="text" value="{{$delivery->phone_sending_by}}" id="" class="form-control " name="stt" required="">
                </div>
                <div class="col-md-3 col-lg-offset-3 col-sm-12 col-xs-12 mb-5">
                    <label>Nomor Telpon Penerima :</label>
                    <input type="text" id="" value="{{$delivery->phone_recipient}}" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-12">
                    <label for="fullname">Detail Barang</label>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-5">
                    <label>Tipe Komoditas :</label>
                    <input type="text" value="{{$delivery->komoditas}}" id="" class="form-control " name="stt" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-5">
                    <label>Status Pengiriman :</label>
                    <input type="text" id="" value="{{$delivery->status}}" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>Asuransi Pengiriman :</label>
                    <input type="text" id="" value="{{$delivery->asuransi_pengiriman}}" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>Estimasi Harga Barang :</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                              <div class="btn btn-default">Rp</div>
                        </span>
                        <input type="text" class="form-control" value="{{$delivery->harga}}">
                    </div>

                 </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                    <label>No Registrasi Pajak :</label>
                    <input type="text" id="" value="{{$delivery->npwp}}" class="form-control mb-3" name="noReferensiExternal" required="">
                </div>
                <div class="col-md-4 col-lg-offset-4 col-sm-12 col-xs-12 mb-5">
                    <label>COD :</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                              <div class="btn btn-default">Rp</div>
                        </span>
                        <input type="text" class="form-control" value="{{$delivery->harga}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-lg-12 table">
                    <table class="table table-striped js-table-barang">
                        <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Serial #</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody class="js-table-data-barang">
                        <tr>
                            <td>1</td>
                            <td><input type="text" width="" class="form-control" value="{{$delivery->berat_barang}}"></td>
                            <td>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" value="{{$delivery->berat_volume}}" data-inputmask="'mask': '99 x 99 x 99'">
                                        <span class="satuan-berat-volume form-control-feedback right" aria-hidden="true">cm</span>
                                    </div>
                                </div>
                            </td>
                            <td>12 kg</td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn-add-barang"><i class="fa fa-plus-circle"></i> Tambah Barang</a>
                </div>

                <div class="row mb-5">
                    <!-- /.col -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">Total Barang:</th>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <th>Total Berat Kotor</th>
                                    <td>$10.34</td>
                                </tr>
                                <tr>
                                    <th>Total Berat Dimensi:</th>
                                    <td>$5.80</td>
                                </tr>
                                <tr>
                                    <th>Berat Dikenakan Biaya:</th>
                                    <td>$265.24</td>
                                </tr>
                                <tr>
                                    <th>Total Harga:</th>
                                    <td>$265.24</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Booking</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


