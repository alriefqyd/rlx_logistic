@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
            @if ($errors->any())
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- start form for validation -->
            <form action="/admin/prices/{{$url}}/{{$price->id}}" method="post" id="demo-form" data-parsley-validate="" novalidate="">
                @csrf
                @method('PUT')
                @include('admin.price.form',[
                    'isRegular' => $isRegularPrice,
                    'price' => $price,
                    'layanans' => $layanan,
                    'isEdit' => true
                ])
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


