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
        <form method="post" action="{{$url}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(isset($slider) && count($slider)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Slider</h4>
                    @for($i = 0; $i<count($slider); $i++)
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title {{$i+1}}</label>
                                <input class="form-control" type="text" name="sliderTitle[]" value=" {{$slider[$i]['title']}}"/>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title {{$i+1}}</label>
                                <input class="form-control" type="text" name="sliderSubtitle[]" value="{{$slider[$i]['subTitle']}}"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label for="image">Image Slider {{$i+1}}</label>
                                {{$slider[$i]['image']}}
                                <input class="form-control" type="file" id="image" name="sliderImage[]" value="{{$slider[$i]['image']}}"/>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    @endfor
                </div>
            @endif
            @if(isset($service) && count($service)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Service</h4>
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
                                <select name="serviceIcon[]" class="form-control select2-icon">
                                    @foreach($icons as $key => $value)
                                        <option value="{{$key}}" {{$key == $service[$j]['icon'] ? 'selected' : ''}} data-icon="{{$key}}">
                                            <i class="{{$key}} text-primary fa-3x flex-shrink-0"></i>
                                            {{$value}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Sub Title {{$j}}</label>
                                <input class="form-control" type="text" name="serviceSubtitle[]" value=" {{$service[$j]['subTitle']}}"/>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Description {{$j}}</label>
                                <textarea class="form-control summernote" type="text" name="serviceDescription[]"> {!!$service[$j]['description']!!}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @endif
                    @endfor
                </div>
            @endif
            @if(isset($whyus) && count($whyus)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Why Us</h4>
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
                                    <select name="whyusIcon[]" class="form-control select2-icon">
                                        @foreach($icons as $key => $value)
                                            <option value="{{$key}}" {{$key == $whyus[$k]['icon'] ? 'selected' : ''}} data-icon="{{$key}}">
                                                <i class="{{$key}} text-primary fa-3x flex-shrink-0"></i>
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Sub Title {{$k}}</label>
                                    <input class="form-control" type="text" name="whyusSubtitle[]" value=" {{$whyus[$k]['subTitle']}}"/>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Description {{$k}}</label>
                                    <textarea class="form-control summernote" type="text" name="whyusDescription[]">{!!$whyus[$k]['description']!!}</textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        @endif
                    @endfor
                </div>
            @endif
            @if(isset($abouts) && count($abouts)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component About</h4>
                    @for($a = 0; $a<count($abouts); $a++)
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="aboutTitle" value=" {{$abouts[$a]['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Sub Title</label>
                                    <input class="form-control" type="text" name="aboutSubtitle" value=" {{$abouts[$a]['subTitle']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Content</label>
                                    <textarea class="form-control summernote" type="text" name="aboutContent">{!! $abouts[$a]['content'] !!}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label for="image">Image</label>
                                    {{$abouts[$a]['image']}}
                                    <input class="form-control" type="file" id="image" name="aboutImage" value="{{$abouts[$a]['image']}}"/>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                    @endfor
                </div>
            @endif
            @if(isset($visis) && count($visis)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Visi Misi</h4>
                    @for($v = 0; $v<count($visis); $v++)
                        @if(array_key_exists('title', $visis[$v]))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="visisTitle" value=" {{$visis[$v]['title']}}"/>
                                </div>
                            </div>
                        @elseif(array_key_exists('image', $visis[$v]))
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="visisImage" value=" {{$visis[$v]['image']}}"/>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Icon {{$v}}</label>
                                    <select name="visisIcon[]" class="form-control select2-icon">
                                        @foreach($icons as $key => $value)
                                            <option value="{{$key}}" {{$key == $visis[$v]['icon'] ? 'selected' : ''}} data-icon="{{$key}}">
                                                <i class="{{$key}} text-primary fa-3x flex-shrink-0"></i>
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Sub Title {{$v}}</label>
                                    <input class="form-control" type="text" name="visisSubtitle[]" value=" {{$visis[$v]['subTitle']}}"/>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                    <label>Description {{$v}}</label>
                                    <textarea class="form-control summernote" type="text" name="visisDescription[]"> {!! $visis[$v]['description'] !!} </textarea>
                                </div>
                            </div>
                        @endif
                        <div class="ln_solid"></div>
                    @endfor
                </div>
            @endif
            @if(isset($facts) && count($facts)>0)
                <div class="x_panel">
                    <h4 class="text-primary mb-5">Component Fact</h4>
                    @for($f = 0; $f<count($facts); $f++)
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Title</label>
                                <input class="form-control" type="text" name="factTitle" value=" {{$facts[$f]['title']}}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                <label>Content</label>
                                <textarea class="form-control summernote" type="text" name="factContent">{!! $facts[$f]['content'] !!}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    @endfor
                </div>
            @endif
            <div class="x_panel">
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    @endif
</div>
@endsection

