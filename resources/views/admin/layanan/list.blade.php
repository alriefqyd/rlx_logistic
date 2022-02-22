@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Booking</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="/admin/layanan/create"> <button class="btn btn-primary">Tambah</button></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <form action="/admin/layanan" method="get">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input type="text" value="{{request('no')}}" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
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
                            <th class="column-title">Nama Layanan </th>
                            <th class="column-title">Lokasi Pengiriman </th>
                            <th class="column-title">Lokasi Tujuan </th>
                            <th class="column-title">Harga (Rp) </th>
                            <th class="column-title">Deskripsi </th>
                            <th class="column-title">Tanggal Dibuat </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($layanan as $l)
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </td>
                                <td class="col-sm-1 a-right a-right ">
                                    <a href="layanan/{{$l->id}}">{{$l->name}}</a>
                                </td>
                                <td class="col-sm-3">{{$l->cityOrigin->getFullLocation()}}</td>
                                <td class="col-sm-3">{{$l->cityDestination->getFullLocation()}}</td>
                                <td class="col-sm-1">{{$l->price}}</td>
                                <td class="col-sm-3">{{$l->description}}</td>
                                <td class="col-sm-2">{{$l->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
