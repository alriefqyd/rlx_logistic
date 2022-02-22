<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\District;

class Delivery extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public $asuransi = [
        'free' => "FREE",
        'basic' => "BASIC",
    ];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function company(){
        return $this->belongsTo(User::class,'company_by');
    }

    public function layanan(){
        return $this->belongsTo(Layanan::class,'layanan_id');
    }

    public function cityOrigin(){
        return $this->belongsTo(District::class,'origin');
    }

    public function cityDestination(){
        return $this->belongsTo(District::class,'destination');
    }

    public function consignments(){
        return $this->hasMany(Consignment::class,'delivery_id');
    }


    /**
     * function for get filter stt/invoice in delivery page
     * @param $query
     * @return mixed
     */
    public function scopeFilter($query, array $filters){
        $query->when($filters['no'] ?? false, fn($query, $q) =>
            $query->where('stt','=', $q)
            ->orwhere('noReferensiExternal','=', $q)
        );

        $query->when($filters['startDate'] ?? false, fn($query, $q) =>
            $query->where('created_at', '>=', $q)
        );

        $query->when($filters['endDate'] ?? false, fn($query, $q) =>
            $query->where('created_at', '<=', $q)
        );
    }


}
