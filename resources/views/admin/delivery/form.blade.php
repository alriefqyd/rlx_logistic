<div class="col-md-6 col-sm-12 col-xs-12">
    <label>Nomor STT :</label>
    @if(!$isEdit)
        <input autofocus type="text" value="{{old('stt')}}" id="" class="form-control js-stt-delivery mb-3" name="stt" required="">
    @else
        <h4>{{$delivery->stt}}</h4>
    @endif
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <label for="">Nomor Referensi External :</label>
    <input type="text" id="" value="{{$isEdit ? $delivery->noReferensiExternal : old('noReferensiExternal')}}" class="form-control mb-3" name="noReferensiExternal" required="">
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-5">
    <label for="">Layanan Pengiriman</label>
    <select class="select2 form-control js-service-delivery js-get-price" name="layanan">
        @foreach($layanan as $layanan)
            <option {{ (collect(old('layanan'))->contains($layanan->id)) || (collect($delivery->layanan)->contains($layanan->id)) ? 'selected="selected"':''  }} value="{{$layanan->id}}">{{$layanan->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <label for="">Corporate</label>
    <select class="select2 js-company js-total-price form-control js-get-price" name="company_sender">
        <option value="" disabled selected>Pilih Corporate</option>
        @foreach($company as $c)
            <option value="{{$c->id}}" {{ (collect(old('company_sender'))->contains($c->id)) ||
                    (collect($delivery->company_sender)->contains($c->id)) ? 'selected="selected"':'' }}>
                {{$c->profile->company_name}}
            </option>
        @endforeach
    </select>
</div>
<div class="col-md-12"></div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-3">
    <label for="">Lokasi Pengiriman</label>
    <select class="select-location js-total-price js-sending-location js-get-price form-control" data-price-url="/getPrice" data-url="/getLocation" name="origin">
        @if($delivery->origin)
            <option selected="selected" value="{{$delivery->origin}}">{{$delivery->cityOrigin->getFullLocation()}}</option>
        @endif
    </select>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-3">
    <label for="">Tujuan Pengiriman</label>
    <select class="select2 select-location js-total-price js-delivery-location js-get-price form-control" data-price-url="/getPrice" data-url="/getLocation" name="destination">
        @if($delivery->destination)
            <option selected="selected" value="{{$delivery->destination}}">{{$delivery->cityDestination->getFullLocation()}}</option>
        @endif
    </select>
</div>
<div class="col-md-12"></div>
<div class="col-md-6 col-sm-12 col-xs-12 js-sender-profile">
    <label for="">Nama Pengirim</label>
    <div class="input-group">
        <input type="text" value="{{$isEdit ? $delivery->senderName : old('senderName')}}" name="senderName" placeholder="" class="form-control js-input-name-sender">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-search-sender">Cari</button>
        </span>
    </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 js-recipient-profile">
    <label for="">Nama Penerima</label>
    <div class="input-group">
        <input type="text" value="{{$isEdit ? $delivery->recipientName : old('recipientName')}}" name="recipientName" placeholder="" class="form-control js-input-recipient">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-search-recipient">Cari</button>
        </span>
    </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-3">
    <label for="">Alamat Pengirim</label>
    <textarea class="form-control js-address-sender" rows="4" name="addressSender" placeholder="Alamat Pengirim">{{$isEdit ? $delivery->addressSender : old('addressSender')}}</textarea>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-3">
    <label for="">Alamat Penerima</label>
    <textarea class="form-control js-address-recipient" name="addressRecipient" rows="4" placeholder="Alamat Penerima">{{$isEdit ? $delivery->addressRecipient : old('addressRecipient')}}</textarea>
</div>
<div class="col-md-3 col-sm-12 col-xs-12 mb-5">
    <label>Nomor Telpon Pengirim :</label>
    <input type="text" value="{{$isEdit ? $delivery->phone_sending_by : old('phone_sending_by')}}" id="" class="form-control js-phone-sender" name="phone_sending_by" required="">
</div>
<div class="col-md-3 col-lg-offset-3 col-sm-12 col-xs-12 mb-5">
    <label>Nomor Telpon Penerima :</label>
    <input type="text" id="" value="{{ $isEdit ? $delivery->phone_recipient : old('phone_recipient')}}" class="form-control js-phone-recipient mb-3" name="phone_recipient" required="">
</div>
<div class="col-md-12">
    <label for="fullname">Detail Barang</label>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-5">
    <label>Tipe Komoditas :  </label>
    <select class="select2 form-control js-select-comodity" name="komoditas">
        @foreach($komoditas as $c)
            <option value="{{$c['key']}}" {{(collect(old('komoditas'))->contains($c['key'])) ||
                    (collect($delivery->komoditas)->contains($c['key'])) ? 'selected="selected"':'' }}
            >{{$c['value']}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-12"></div>
<div class="col-md-4 col-sm-12 col-xs-12 mb-5">
    <label>Asuransi Pengiriman :</label>
    <select name="asuransi_pengiriman" class="form-control js-total-price js-select-asuransi">
        @foreach($asuransi as $value)
            <option value="{{$value}}" {{(collect(old('asuransi_pengiriman'))->contains($value)) ||
                    (collect($delivery->asuransi_pengiriman)->contains($value)) ? 'selected="selected"':'' }}>{{ucwords(strtolower($value))}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 col-sm-12 col-xs-12 mb-5">
    <label>Estimasi Harga Barang :</label>
    <div class="input-group">
            <span class="input-group-btn">
                  <div class="btn btnx-default">Rp</div>
            </span>
        <input type="text" name="harga" class="form-control" value="{{$isEdit ? $delivery->harga : old('harga')}}">
    </div>

</div>
<div class="col-md-4 col-sm-12 col-xs-12 mb-5">
    <label>No Registrasi Pajak :</label>
    <input type="text" id="" value="{{$isEdit ? $delivery->npwp : old('npwp')}}" class="form-control mb-3" name="npwp" required="">
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
        @if($isEdit)
            @foreach($consignments as $consignment)
                <tr class="js-row-data-barang">
                    <td>{{$loop->index + 1}}</td>
                    <td><input type="text" width="" name="berat_barang[]" class="form-control js-berat-barang js-total-price js-price-recap" value="{{$consignment->berat_barang}}"></td>
                    <input type="hidden" name="consignment_id[]" value="{{$consignment->id}}">
                    <td>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <input type="text" name="dimensi[]" class="form-control js-total-price js-price-recap js-dimensi" value="{{$consignment->dimensi}}">
                                <input type="hidden" name="berat_volume[]" class="form-control js-total-price js-price-recap js-volume-field" value="{{$consignment->berat_volume}}">
                                <input type="hidden" name="berat_biaya[]" class="form-control js-berat-biaya-per-barang" value="{{max($consignment->berat_barang,$consignment->berat_volume)}}">
                                <span class="satuan-berat-volume form-control-feedback right" aria-hidden="true">cm</span>
                            </div>
                        </div>
                    </td>
                    <td><span class="js-volume">{{$consignment->berat_volume}}</span> Kg</td>
                </tr>
            @endforeach
        @else
            <tr class="js-row-data-barang">
                <td>1</td>
                <td><input type="text" width="" name="berat_barang[]" class="form-control js-berat-barang js-total-price js-price-recap" value="{{old('berat_barang[]')}}"></td>
                <td>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <input type="text" name="dimensi[]" class="form-control js-total-price js-price-recap js-dimensi" value="{{old('dimensi[]')}}">
                            <input type="hidden" name="berat_volume[]" class="form-control js-total-price js-price-recap js-volume-field" value="{{old('berat_volume[]')}}">
                            <input type="hidden" name="berat_biaya[]" class="form-control js-berat-biaya-per-barang">
                            <span class="satuan-berat-volume form-control-feedback right" aria-hidden="true">cm</span>
                        </div>
                    </div>
                </td>
                <td><span class="js-volume">0</span> Kg</td>
            </tr>
        @endif
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
                    <td class="js-total-barang-label">{{$isEdit ? sizeof($consignments) : 0}}</td>
                    <input type="hidden" value="{{$isEdit ? sizeof($consignments) : 0}}" class="js-total-barang-field" name="total_packet">
                </tr>
                <tr>
                    <th>Total Berat Kotor</th>
                    <td><span class="js-total-berat-kotor">{{$isEdit ? $totalBerat : 0}} </span> Kg</td>
                    <input type="hidden" value="{{$isEdit ? $totalBerat : 0}}" class="js-total-berat-kotor-field" name="actual_weight">
                </tr>
                <tr>
                    <th>Total Berat Volume:</th>
                    <td><span class="js-total-berat-dimensi">{{$isEdit ? $beratVolume : 0}} </span> Kg</td>
                    <input type="hidden" value="{{$isEdit ? $beratVolume : 0}}" class="js-total-berat-dimensi-field" name="dimension_weight">
                </tr>
                <tr>
                    <th>Berat Dikenakan Biaya:</th>
                    <td><span class="js-total-berat-dikenakan-biaya">{{$isEdit ? max($totalBerat,$beratVolume) : 0 }} </span> Kg</td>
                </tr>
                <tr>
                    <th>Total Harga:</th>
                    <td>Rp <span class="total-harga">{{$isEdit ? number_format($totalPrice) : 0}}</span></td>
                    <input type="hidden" value="{{$isEdit ? $totalPrice : 0}}" class="total-harga-field" name="total_price">
                </tr>
                <tr>
                    <th style="width:50%">Biaya Kirim</th>
                    <td class="">Rp <span class="js-biaya-kirim-label">{{$isEdit ? number_format($delivery->sending_price) : ''}}</span>
                        <input type="hidden" class="js-sending-price" value="{{$isEdit ? $delivery->sending_price : ''}}" name="sending_price">
                    </td>
                </tr>
                <tr>
                    <th style="width:50%">Biaya Asuransi</th>
                    <td class="">Rp <span class="js-biaya-asuransi-label">{{$isEdit ? number_format($delivery->insurance) : 0}}</span>
                        <input type="hidden" value="{{$isEdit ? $delivery->insurance : 0}}" class="js-asuransi-price" name="insurance">
                    </td>
                </tr>
                <tr>
                    <th style="width:50%">PPN 1%</th>
                    <td class="">Rp <span class="js-biaya-pajak-label">{{$isEdit ? number_format($delivery->ppn) : 0}}</span>
                        <input type="hidden" value="{{$isEdit ? $delivery->ppn : 0}}" class="js-pajak-price" name="ppn">
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
        <li class="js-submit-booking" {{$isEdit ? 'data-url=/admin/delivery/'.$delivery->id.'?print_resi=true&' : 'data-url=/admin/delivery/?print_resi=true&'}}
            data-print="true"><a href="#">Booking dan Print Resi</a>
        </li>
        <li class="js-submit-booking" {{$isEdit ? 'data-url=/admin/delivery/'.$delivery->id.'?print_resi=false&' : 'data-url=/admin/delivery/?print_resi=false&'}}
            data-print="false"><a href="#">Booking tanpa Resi</a>
        </li>
    </ul>
</div>
