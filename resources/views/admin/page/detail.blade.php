@extends('admin.layouts.main')
@section('main_content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail</h2>
            <div class="clearfix"></div>
        </div>
    </div>
    @if($page)
        <form method="post" action="/admin/page/home/">
            @csrf
            @method('PUT')
            @if($slider)
                <div class="x_panel">
                    <label>Slider</label>
                    @for($i = 0; $i<count($slider); $i++)
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title {{$i+1}}</label>
                                <input class="form-control" type="text" name="sliderTitle[]" value=" {{$slider[$i]['title']}}"/>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title {{$i+1}}</label>
                                <input class="form-control" type="text" name="sliderSubtitle[]" value=" {{$slider[$i]['subTitle']}}"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Image Slider {{$i+1}}</label>
                                <input class="form-control" type="file" name="sliderImage[]" value=" {{$slider[$i]['image']}}"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    @endfor
                </div>
            @endif
            @if($service)
                <div class="x_panel">
                    <label>Slider</label>
                    @for($j = 0; $j<count($service); $j++)
                        @if(array_key_exists('title', $service[$j]))
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title</label>
                                    <input class="form-control" type="text" name="serviceTitle" value=" {{$service[$j]['title']}}"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @else
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Icon {{$j}}</label>
                                <input class="form-control" type="text" name="serviceIcon[]" value=" {{$service[$j]['icon']}}"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title {{$j}}</label>
                                <input class="form-control" type="text" name="serviceSubtitle[]" value=" {{$service[$j]['subTitle']}}"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Description {{$j}}</label>
                                <input class="form-control" type="text" name="serviceDescription[]" value=" {{$service[$j]['description']}}"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @endif
                    @endfor
                </div>
            @endif
            @if($whyus)
                <div class="x_panel">
                    <label>Slider</label>
                    @for($k = 0; $k<count($whyus); $k++)
                        @if(array_key_exists('title', $whyus[$k]))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="whyusTitle" value=" {{$whyus[$k]['title']}}"/>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Icon {{$k}}</label>
                                    <input class="form-control" type="text" name="whyusIcon[]" value=" {{$whyus[$k]['icon']}}"/>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Sub Title {{$k}}</label>
                                    <input class="form-control" type="text" name="whyusSubtitle[]" value=" {{$whyus[$k]['subTitle']}}"/>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Description {{$k}}</label>
                                    <input class="form-control" type="text" name="whyusDescription[]" value=" {{$whyus[$k]['description']}}"/>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        @endif
                    @endfor
                </div>
            @endif
            <div class="x_panel">
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    @endif



{{--            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                <label>Judul</label>--}}
{{--                <input class="form-control" type="text" name="title[]"/>--}}
{{--            </div>--}}
{{--            <div class="col-md-12 col-sm-12 col-xs-12 mb-5">--}}
{{--                <label>Sub Judul</label>--}}
{{--                <input class="form-control" type="text" value="{{$page->title}}" name="subtitle[]"/>--}}
{{--            </div>--}}
{{--            @foreach($content as $c => $val)--}}
{{--                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                    <label>Content {{$val['order']}}</label>--}}
{{--                    <textarea class="summernote" name="content">{{$val['content']}}</textarea>--}}
{{--                </div>--}}
{{--                @if($val['point1'])--}}
{{--                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                        <label>Poin 1</label>--}}
{{--                        <input class="form-control" type="text" value="{{$val['point1']}}" name="poin1"/>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($val['point2'])--}}
{{--                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                        <label>Poin 2</label>--}}
{{--                        <input class="form-control" type="text" value="{{$val['point2']}}" name="poin2"/>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($val['point2'])--}}
{{--                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                        <label>Poin 3</label>--}}
{{--                        <input class="form-control" type="text" value="{{$val['point3']}}" name="poin3"/>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($val['point4'])--}}
{{--                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">--}}
{{--                        <label>Poin 4</label>--}}
{{--                        <input class="form-control" type="text" name="poin4" value="{{$val['point4']}}"/>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if($val['image'])--}}
{{--                    <div class="col-md-12 col-sm-12 col-xs-12 mb-5">--}}
{{--                        <label>Picture</label>--}}
{{--                        <input class="form-control" type="file" name="image" value="{{$val['image']}}"/>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </form>--}}
        <!-- end form for validations -->
{{--    </div>--}}

</div>
@endsection

