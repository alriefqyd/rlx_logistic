@extends('admin.layouts.main')
@section('main_content')
<div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
        <div class="x_title">
            <h2>Table Price {{$isRoleCorporate ? $companyUser->profile->company_name : ''}}</h2>
            <div class="clearfix"></div>
        </div>
        <!-- start form for validation -->
        @if ($errors->any())
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" class="js-price-form" action="/admin/prices/{{$formUrl}}/store" id="demo-form" data-parsley-validate="" novalidate="">
            @csrf
            @include('admin.price.form',[
                'layanans' => $layanans,
                'isRoleCorporate' => $isRoleCorporate,
                'isEdit' => false,
                'price' => $price
            ])
            <button class="btn btn-danger" type="cancel">Cancel</button>
            <button class="btn btn-success js-submit-price" type="submit">Update</button>
        </form>
        <!-- end form for validations -->
    </div>
</div>


@endsection
