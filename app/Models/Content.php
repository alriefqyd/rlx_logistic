<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    const ABOUT = 'page';
    const HOME = 'home';


    protected $guarded = ['id'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function profile(){

    }



}
