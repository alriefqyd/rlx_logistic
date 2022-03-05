<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    const ABOUT = 'about';
    const HOME = 'home';
    const ICON = [
        'fa fa-user-circle' => "User Icon" ,
        'fa fa-truck' => "Truck Icon",
        'fas fa-shipping-fast' => "Shipping Icon",
        'fa fa-file-alt' => "File Icon",
        'fas fa-boxes' => "Boxes Icon",
        'fa fa-plane' => "Plane Icon",
        'fa fa-home' => "Home Icon",
        'fas fa-warehouse' => "Warehouse Icon",
        'fas fa-dolly-flatbed' => "Flatbed Icon"
    ];


    protected $guarded = ['id'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function profile(){

    }



}
