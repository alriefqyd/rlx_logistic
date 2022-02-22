@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail</h2>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_panel">
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate="" novalidate="">
                <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                    <label>Judul</label>
                    <input class="form-control" type="text" name="title[]"/>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-5">
                    <label>Sub Judul</label>
                    <input class="form-control" type="text" value="{{$about->title}}" name="subtitle[]"/>
                </div>
                @foreach($content as $c => $val)
                    <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                        <label>Content {{$val['order']}}</label>
                        <textarea class="summernote" name="content">{{$val['content']}}</textarea>
                    </div>
                    @if($val['point1'])
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                            <label>Poin 1</label>
                            <input class="form-control" type="text" value="{{$val['point1']}}" name="poin1"/>
                        </div>
                    @endif
                    @if($val['point2'])
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                            <label>Poin 2</label>
                            <input class="form-control" type="text" value="{{$val['point2']}}" name="poin2"/>
                        </div>
                    @endif
                    @if($val['point2'])
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                            <label>Poin 3</label>
                            <input class="form-control" type="text" value="{{$val['point3']}}" name="poin3"/>
                        </div>
                    @endif
                    @if($val['point4'])
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                            <label>Poin 4</label>
                            <input class="form-control" type="text" name="poin4" value="{{$val['point4']}}"/>
                        </div>
                    @endif
                @endforeach
            </form>
            <!-- end form for validations -->
        </div>
        <div class="x_panel">
            <button class="btn btn-danger" type="cancel">Cancel</button>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </div>
@endsection

