<div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('origin') bad @enderror">
    <label for="">Lokasi Pengiriman</label>
    <select class="select2 select-location form-control"
            data-rule-isLocationExist="true"
            data-url="/getLocation"
            name="origin">
        @if($isEdit)
            <option selected="selected" value="{{$price->origin_location}}">{{$price->originLocation->getFullLocation()}}</option>
        @endif
    </select>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('destination') bad @enderror">
    <label for="">Tujuan Pengiriman</label>
    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">
        @if($isEdit)
            <option selected="selected" value="{{$price->destination_location}}">{{$price->destinationLocation->getFullLocation()}}</option>
        @endif
    </select>
</div>
@if(!$isRegular && !$isRoleCorporate)
    <div class="col-md-12 col-sm-12 col-xs-12 mb-3 @error('company') bad @enderror">
        <label for="">Company</label>
        <select class="select2 form-control" name="company">
            @if($isEdit)
                <option value="{{$price->company}}">{{$price->companyBy->profile->company_name}}</option>
            @else
                @foreach($company as $c)
                    <option value="{{$c->id}}" {{ (collect(old('company'))->contains($c->id))
                        || $c->id == $corporateId ? 'selected="selected"':'' }}>
                        {{$c->profile->company_name}}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
@endif
<div class="col-md-12 col-sm-12 col-xs-12 mb-2 @error('price') bad @enderror">
    <label>{{isset($price->regular_price) ? 'Regular' : ''}} Price</label>
    <span class="label label-danger"></span>
    @if($isEdit && $price->isRegularPrice)
        <input type="number" value="{{$isEdit ? $price->regular_price : old('regular_price') }}" id="" class="form-control mb-3" name="regular_price" required="">
    @else
        <input type="number" value="{{$isEdit ? $price->price : old('company_price')}}" id="" class="form-control mb-3" name="company_price" required="">
    @endif
</div>
<div class="col-md-12 col-sm-12 col-xs-12 mb-5 @error('layanan') bad @enderror">
    <label>Layanan</label>
    <span class="label label-danger"></span>
    <select name="layanan" class="form-control">
        @foreach($layanans as $layanan)
            <option {{ (collect(old('layanan'))->contains($layanan->id))
                        || $layanan->id == $price->layanan ? 'selected="selected"':'' }}
                    value="{{$layanan->id}}">{{$layanan->name}}</option>
        @endforeach
    </select>
</div>

