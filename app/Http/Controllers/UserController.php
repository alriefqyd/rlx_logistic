<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request){

        $this->authorize('admin');
        $users = User::with('profile','roles')->filter(request(['user']));
        return view('admin/user/list', [
            'users' => $users->orderBy('created_at','DESC')->paginate(5)->withQueryString()
        ]);
    }

    public function show(User $user){
        $this->authorize('admin');
        $user->load('profile','roles');
        $userRole = array();
        foreach ($user->roles as $ur){
            array_push($userRole,$ur->id);
        }
        $role = Role::all();
        return view('admin/user/detail', [
            "title" => "User List",
            "user" => $user,
            'role' => $role,
            'userRole' => $userRole
//             $user->load('relasi lain') // lazy eager loading
        ]);
    }

    public function create(){
        $role = Role::all();
        $this->authorize('admin');
        $userRole = array();
        foreach ($role as $ur){
            array_push($userRole,$ur->id);
        }
        $role = Role::all();
        return view('admin.user.create', [
            "title" => "User List",
            'role' => $role,
            'userRole' => $userRole
//             $user->load('relasi lain') // lazy eager loading
        ]);
    }

    public function store(Request $request){
        $this->validate($request, array(
            'email' => 'required|email:dns|unique:users',
            'username' => ['required','unique:users'],
            'password' => ['required'],
            'full_name' => ['required'],
            'phone' => ['required'],
            'company_name' => ['required'],
            'address' => ['required'],
            'role' => ['required'],
        ));

        $profileData['created_by'] = auth()->user()->id;
        $profile = Profile::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'created_by' => auth()->user()->id
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->created_by = auth()->user()->id;
        $user->profile()->associate($profile);
        $user->save();
        $user->roles()->sync($request->role);
        toastr()->success('Data Berhasil Disimpan');
        return redirect('admin/users');
    }
}
