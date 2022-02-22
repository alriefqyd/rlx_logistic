@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate="" novalidate="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label>Nama Layanan</label>
                    <input type="text" value="{{$layanan->name}}" id="" class="form-control mb-3" name="name" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Code Layanan :</label>
                    <input type="text" id="" value="{{$layanan->code}}" class="form-control mb-3" name="code" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="">Harga :</label>
                    <input type="text" id="" value="{{$layanan->price}}" class="form-control mb-3" name="price" required="">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" rows="4" placeholder="Deskripsi">
                        {{$layanan->description}}
                    </textarea>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Lokasi Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">
                        <option>Pilih Lokasi</option>
                        @if($layanan->origin)
                            <option selected="selected" value="{{$layanan->origin}}">{{$layanan->cityOrigin->getFullLocation()}}</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Tujuan Pengiriman</label>
                    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
                        <option>Pilih Lokasi</option>
                        @if($layanan->destination)
                            <option selected="selected" value="{{$layanan->destination}}">{{$layanan->cityDestination->getFullLocation()}}</option>
                        @endif
                    </select>
                </div>
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


