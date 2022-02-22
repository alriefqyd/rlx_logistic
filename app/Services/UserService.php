<?php
namespace App\Services;
use App\Models\RoleUser;
use App\Models\User;
use PhpParser\Node\Expr\Array_;

class UserService
{
    public $admin = [
        'ROLE_ADMIN'
    ];
    public $page = [
        'ROLE_ADMIN',
        'ROLE_CONTENT',
    ];
    public $delivery = [
        'ROLE_CORPORATE',
        'ROLE_ADMIN',
        'ROLE_DELIVERY'
    ];
    public $layanan = [
        'ROLE_ADMIN',
        'ROLE_LAYANAN'
    ];
    public $harga_regular = [
        'ROLE_ADMIN',
        'ROLE_PRICE_REGULAR'
    ];
    public $harga_corporate = [
        'ROLE_ADMIN',
        'ROLE_CORPORATE',
        'ROLE_PRICE_CORPORATE'
    ];


    public function getUserRole(){
        $roles = auth()->user()->roles;
        $role = array();
        foreach ($roles as $r){
            array_push($role, $r->authority);
        }
        return $role;
    }

    public function isUserHaveAccess(Array $role){
        $userRole = $this->getUserRole();
        $result = !empty(array_intersect($role, $userRole));
        return $result;
    }

}
