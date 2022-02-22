@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <a href="{{ url('track/?resi=' . $delivery->invoice) }}"> <button class="btn btn-primary">Lacak Pengiriman Barang</button></a>
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
            <form action="/admin/delivery/{{$delivery->id}}" method="post" id="demo-form" data-url-redirect="{{URL::to('/admin/delivery')}}" data-parsley-validate="" class="form-delivery js-form-delivery" novalidate="">
                @csrf
                @method('put')
                @include('admin.delivery.form',[
                    'isEdit' => true,
                    'layanan' => $layanan,
                    'company' => $company,
                    'komoditas' => $komoditas,
                    'asuransi' => $asuransi,
                    'delivery' => $delivery,
                    'consignments' => $consignment,
                    'totalBerat' => $totalBerat,
                    'beratVolume' => $beratVolume,
                    'totalPrice' => $totalPrice
                ])
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


