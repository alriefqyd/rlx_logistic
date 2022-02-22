@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <form id="demo-form" action="/admin/layanan/{{$layanan->id}}" method="post" action="" data-parsley-validate="" novalidate="">
                @csrf
                @method('PUT')
                @include('admin.layanan.form',[
                    'layanan' => $layanan,
                    'isEdit' => true
                ])
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


