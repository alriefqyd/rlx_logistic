@extends('admin.layouts.main')
@section('main_content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tabel <small>Daftar User Harga</small></h3>
            </div>
            <div class="title_right">
                <form action="/prices">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" name="user" class="form-control" value="{{request('user')}}" placeholder="Cari User">
                            <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Search</button>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <a href="/prices/add"> <button class="btn btn-primary">Tambah</button></a>

                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </th>
                                    <th class="column-title">Lokasi Pengiriman </th>
                                    <th class="column-title">Tujuan Pengiriman </th>
                                    <th class="column-title">Harga Regular </th>
                                    <th class="column-title">Action </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($price as $pc)
                                <tr class="odd pointer">
                                    <td class="a-center ">
                                        <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </td>
                                    <td class=" ">{{$pc->districtAt($pc->origin_location)}}</td>
                                    <td class=" ">{{$pc->districtAt($pc->destination_location)}}</td>
                                    <td class=" ">Rp {{number_format($pc->regular_price, 0)}}</td>
                                    <td><a href="prices/detail/{{$pc->origin_location}}/{{$pc->destination_location}}"> Detail</a> </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$price->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--                <li><a href="prices/detail/{{$pc->id}}"> {{$pc->username}} - {{$pc->profile->first_name}} ({{$pc->id}})</a></li>--}}
{{--                <ol>--}}
{{--                    @foreach($pc->price as $p)--}}
{{--                        <li>From {{$p->origin_location}} - {{$p->destination_location}} : {{$p->price}} </li>--}}
{{--                    @endforeach--}}
{{--                </ol>--}}
