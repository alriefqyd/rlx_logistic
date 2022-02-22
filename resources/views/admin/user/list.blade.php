@extends('admin.layouts.main')
@section('main_content')

<di class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Table Booking</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a href="/admin/users/create"> <button class="btn btn-primary">Tambah</button></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <form action="/admin/users" method="get">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="input-group">
                    <input type="text" value="{{request('user')}}" name="user" placeholder="Masukkan Email/Nama" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                </div>
            </div>
        </form>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Email </th>
                        <th class="column-title">User Name </th>
                        <th class="column-title">Full Name</th>
                        <th class="column-title">Address</th>
                        <th class="column-title">Phone Number</th>
                        <th class="column-title">Company Name</th>
                        <th class="column-title">Created At</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr class="odd pointer">
                            <td class="col-sm-1 a-right a-right ">
                                <a href="/admin/users/{{$user->id}}">{{$user->email}}</a>
                            </td>
                            <td class="col-sm-1 a-right a-right ">
                                <a href="/admin/users/{{$user->id}}">{{$user->username}}</a>
                            </td>
                            <td class="col-sm-1">{{$user->profile->full_name}}</td>
                            <td class="col-sm-1">{{$user->profile->address}}</td>
                            <td class="col-sm-1">{{$user->profile->phone}}</td>
                            <td class="col-sm-1">{{$user->profile->company_name ?? '-'}}</td>
                            <td class="col-sm-1">{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->links()}}
        </div>
    </div>
</di>

@endsection
