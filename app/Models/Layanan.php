<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;

class Layanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function delivery(){
        return $this->hasMany(Delivery::class,'layanan_id');
    }

    public function cityOrigin(){
        return $this->belongsTo(District::class,'origin');
    }

    public function cityDestination(){
        return $this->belongsTo(District::class,'destination');
    }

    public function price(){
        return $this->belongsTo(Price::class,'layanan');
    }

}
