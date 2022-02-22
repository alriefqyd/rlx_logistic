@extends('admin.layouts.main')
@section('main_content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table User</h2>
                <div class="clearfix"></div>
            </div>
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate="" novalidate="">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label>Email</label>
                    <input type="text" value="{{$user->email}}" id="" class="form-control mb-3" name="email" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">User Name :</label>
                    <input type="text" id="" value="{{$user->username}}" class="form-control mb-3" name="username" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Password :</label>
                    <input type="password" id="" value="{{bcrypt($user->password)}}" class="form-control mb-3" name="username" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label for="">Retype Password :</label>
                    <input type="password" id="" value="{{bcrypt($user->password)}}" class="form-control mb-3" name="username" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="" value="{{$user->profile->full_name}}" class="form-control mb-3" name="full_name" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Phone Number</label>
                    <input type="text" id="" value="{{$user->profile->phone}}" class="form-control mb-3" name="phone" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Company</label>
                    <input type="text" id="" value="{{$user->profile->company_name}}" class="form-control mb-3" name="company" required="">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">Address</label>
                    <input type="text" id="" value="{{$user->profile->address}}" class="form-control mb-3" name="address" required="">
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="">User Role</label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                    <select class="dual-list form-control" multiple="multiple" name="role[]" title="duallistbox_demo1[]">
                        @foreach($role as $role)
                            <option value="{{$role->id}}" {{in_array($role->id,$userRole) ? 'selected="selected"' : ''}}>{{$role->name}} </option>
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


