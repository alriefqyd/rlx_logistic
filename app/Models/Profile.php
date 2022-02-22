<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class); //since we move foreign key to user as profile id this is not used
    }

    public function createdBy()
    {
        return $this->belongsTo('user', 'created_by'); //to get user profile created by
    }

//    public function content(){
//        $this->hasMany(Content::class,'user_id');
//    }
}
