@extends('admin.layouts.main')
@section('main_content')
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
                            @foreach($origin as $o)
                                <option {{request('origin') == $o[0]->origin_location ? 'selected="selected"' : ''}} value="{{$o[0]->origin_location}}">{{$o[0]->originLocation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <select name="destination" class="form-control select2" data-placeholder="Tujuan Pengiriman">
                            <option value="">Pilih Tujuan Pengiriman</option>
                            @foreach($destination as $d)
                                <option {{request('destination') == $d[0]->destination_location ? 'selected="selected"' : ''}} value="{{$d[0]->destination_location}}">{{$d[0]->destinationLocation->name}}</option>
                            @endforeach
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
                        @foreach($data as $d)
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </td>
                                <td class="col-sm-1">Rp {{number_format($d->regular_price, 0)}}</td>
                                <td class="col-sm-3">{{$d->originLocation->getFullLocation()}}</td>
                                <td class="col-sm-3">{{$d->destinationLocation->getFullLocation()}}</td>
                                <td class="col-sm-2">{{$d->createdBy->profile->full_name}}</td>
                                <td class="col-sm-2">{{$d->created_at}}</td>
                                <td class="col-sm-2 a-right a-right ">
                                    <a href="/admin/prices/regular/{{$d->id}}">Detail</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$data->links()}}
            </div>
        </div>
    </div>
@endsection
