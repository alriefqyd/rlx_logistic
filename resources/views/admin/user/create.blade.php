@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table User</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <form method="post" action="/admin/users" id="demo-form" data-parsley-validate="" novalidate="">
                @csrf
                <div class="col-md-6 col-sm-12 col-xs-12 @error('email') bad @enderror">
                    <label>Email</label>
                    <span class="label label-danger">@error('email'){{$message}}@enderror</span>
                    <input type="email" value="{{old('email')}}" id="" class="form-control mb-3" name="email" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 @error('username') bad @enderror">
                    <label for="">User Name :</label>
                    <span class="label label-danger">@error('username'){{$message}}@enderror</span>
                    <input type="text" id="" value="{{old('username')}}" autocomplete="off" class="form-control mb-3" name="username" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 @error('password') bad @enderror">
                    <label for="">Password :</label>
                    <span class="label label-danger">@error('password'){{$message}}@enderror</span>
                    <input type="password" id="" class="form-control mb-3" name="password" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 @error('password2') bad @enderror">
                    <label for="">Retype Password :</label>
                    <input type="password" id="" class="form-control mb-3" name="password2" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('full_name') bad @enderror">
                    <label for="">Full Name</label>
                    <span class="label label-danger">@error('full_name'){{$message}}@enderror</span>
                    <input type="text" id="" value="{{old('full_name')}}" class="form-control mb-3" name="full_name" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('phone') bad @enderror">
                    <label for="">Phone Number</label>
                    <span class="label label-danger">@error('phone'){{$message}}@enderror</span>
                    <input type="text" id="" value="{{old('phone')}}" class="form-control mb-3" name="phone" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('company_name') bad @enderror">
                    <label for="">Company</label>
                    <span class="label label-danger">@error('company_name'){{$message}}@enderror</span>
                    <input type="text" id="" value="{{old('company_name')}}" class="form-control mb-3" name="company_name" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3 @error('address') bad @enderror">
                    <label for="">Address</label>
                    <span class="label label-danger">@error('address'){{$message}}@enderror</span>
                    <input type="text" id="" value="{{old('address')}}" class="form-control mb-3" name="address" required="">
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">User Role</label>
                    <span class="label label-danger">@error('role'){{$message}}@enderror</span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-3 @error('role') bad @enderror">
                    <select class="dual-list form-control" multiple="multiple" name="role[]" title="duallistbox_demo1[]">
                        @foreach($role as $role)
                            <option {{ (collect(old('role'))->contains($role->id)) ? 'selected="selected"':'' }} value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button class="btn btn-danger" type="cancel">Cancel</button>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
@endsection


