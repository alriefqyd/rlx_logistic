<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

//    private $guarded = ['id']
    protected $fillable = ['berat_barang','berat_volume','dimensi'];

    public function delivery(){
        $this->belongsTo(Delivery::class,'delivery_id');
    }
}
