<div class="col-md-12 col-sm-12 col-xs-12">
    <label>Nama Layanan</label>
    <input type="text" value="{{old('name') ?: $layanan->name}}" id="" class="form-control mb-3" name="name" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <label for="">Code Layanan :</label>
    <input type="text" id="" value="{{old('code') ?: $layanan->code}}" class="form-control mb-3" name="code" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <label for="">Harga :</label>
    <input type="text" id="" value="{{old('price') ?: $layanan->price}}" class="form-control mb-3" name="price" required="">
</div>
<div class="col-md-12 col-sm-12 col-xs-12 mb-3">
    <label for="">Deskripsi</label>
    <textarea class="form-control" name="description" rows="4" placeholder="Deskripsi">{{old('description') ?: $layanan->description}}</textarea>
</div>
{{--<div class="col-md-6 col-sm-12 col-xs-12 mb-3">--}}
{{--    <label for="">Lokasi Pengiriman</label>--}}
{{--    <select class="select2 select-location form-control" data-url="/getLocation" name="origin">--}}
{{--        @if($layanan->origin)--}}
{{--            <option selected="selected" value="{{$layanan->origin}}">{{$layanan->cityOrigin->getFullLocation()}}</option>--}}
{{--        @endif--}}
{{--    </select>--}}
{{--</div>--}}
{{--<div class="col-md-6 col-sm-12 col-xs-12 mb-3">--}}
{{--    <label for="">Tujuan Pengiriman</label>--}}
{{--    <select class="select2 select-location form-control" data-url="/getLocation" name="destination">--}}
{{--        @if($layanan->destination)--}}
{{--            <option selected="selected" value="{{$layanan->destination}}">{{$layanan->cityDestination->getFullLocation()}}</option>--}}
{{--        @endif--}}
{{--    </select>--}}
{{--</div>--}}


