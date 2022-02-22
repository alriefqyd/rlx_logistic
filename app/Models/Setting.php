<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /* setting code */
    const KOMODITAS = "KOMODITAS";

    protected $guarded = ['id'];
}
