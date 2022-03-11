@extends('layouts.main')
@section('main')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cek Resi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Cek Resi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="card-track-container-desktop container mt-5 mb-3" style="width: 50%;">
    <div class="row">
        <div class="col-md-12 card-overlap">
            <div class="card p-3 mb-3" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">
                <form action="/track" method="get">
                    <div class="row">
                        <h6>Lacak Pengiriman</h6>
                        <div class="col-10 col-sm-10">
                            <input type="text" class="form-control border-2" name="resi" value="{{request('resi')}}" placeholder="No Resi" style="height: 45px; border-radius: 10px;">
                        </div>
                        <div class="col-2 col-sm-2">
                            <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"><i class="track-icon fa fa-shipping-fast fa-1x text-primary mb-2"></i> Lacak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Card -->
<div class="card-track-container-mobile container mt-5 mb-3">
    <div class="row">
        <div class="col-md-12 card-overlap">
            <div class="card p-3 mb-3" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">
                <div class="row">
                    <h6>Lacak Pengiriman</h6>
                    <div class="col-9 col-sm-9 card-overlap-form">
                        <input type="text" class="form-control border-2" placeholder="No Resi" style="height: 45px; border-radius: 10px;">
                    </div>
                    <div class="col-2 col-sm-2 card-overlap-button">
                        <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"><i class="track-icon fa fa-shipping-fast fa-1x text-primary mb-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 mb-3" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">

            </div>
        </div>
    </div>
</div>

<div class="container track-history mt-5 mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 mb-3 mt-2" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">
                @if(!isset($invoice))
                    Data Not Found
                @else
                <ul class="cbp_tmtimeline">
                    @foreach($history as $his)
                        <li>
                            <time class="cbp_tmtime" datetime="">
                            <span class="hidden">{{$his['date']}}</span></time>
                            <div class="cbp_tmicon {{ $loop->first || $loop->last ? 'bg-blush' : 'bg-white'}}">
                                <i class="{{ $loop->first ? 'fas fa-clipboard-check' : ''}}
                                {{$loop->last ? "fas fa-box" : '' }}
                                {{!$loop->first && !$loop->last ? 'fas fa-truck text-primary' : ''}}
                                {{$loop->first || $loop->last ? "style=color:white" : ""}}"
                                                                style="color: white;"></i></div>
                            <div class="cbp_tmlabel">
                                <p class="text-primary">{{$his['desc']}}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection