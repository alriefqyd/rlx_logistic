@extends('admin.layouts.main')
@section('main_content')
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
                    <input type="text" value="{{request('no')}}" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
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
                <input type="hidden" value="{{request('no')}}" name="no" placeholder="Masukkan No.STT/Invoice/Referensi External" class="form-control">
                <input type="hidden" value="{{request('startDate')}}" name="startDate" class="js-start-date">
                <input type="hidden" name="endDate" value="{{request('endDate')}}" class="js-end-date">
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
                    @foreach($delivery as $d)
                        <tr class="even pointer">
                            <td class="col-sm-1"><a href="delivery/{{$d->id}}/edit">{{$d->stt}}</a></td>
                            <td class="col-sm-3">{{$d->noReferensiExternal}}</td>
                            <td class="col-sm-3">{{$d->senderName}}</td>
                            <td class="col-sm-2">{{$d->createdBy->profile->full_name}}</td>
                            <td class="col-sm-2">{{$d->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$delivery->links()}}

        </div>
    </div>
</div>
@endsection
