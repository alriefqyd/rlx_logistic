<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Indonesia;
use Laravolt\Indonesia\Models\District;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['origin_location','destination_location'];

    public function companyBy(){
        return $this->belongsTo(User::class,'company');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function originLocation()
    {
        return $this->belongsTo(District::class,'origin_location');
    }

    public function destinationLocation()
    {
        return $this->belongsTo(District::class,'destination_location');
    }

    public function layanan(){
        return $this->hasOne(Layanan::class,'layanan');
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['invoice'] ?? false, fn($query, $invoice) =>
        $query->Wherehas('deliveries', fn($q) =>
        $q->where('invoice','=', $invoice)
        ));

        $query->when($filters['destination'] ?? false, function($query, $destination){
            return $query->where('destination_location','=' ,$destination);
        });

        $query->when($filters['origin'] ?? false, function($query, $origin){
            return $query->where('origin_location','=' ,$origin);
        });

        $query->when($filters['company'] ?? false, fn($query, $company) =>
            $query->where('company',$company)
        );
    }

    public function getRegularPrice(){
        $price = $this->where('origin_location', $this->origin_location)->where('destination_location',$this->destination_location)
            ->where('isRegularPrice',true)->first();
            return $price->regular_price ?? 0;
        }


    public function getRegularPriceDelivery(){
        $price = $this->where('origin_location', $this->origin_location)->where('destination_location',$this->destination_location)
            ->where('isRegularPrice',true)->first();
        return $price->regular_price ?? 0;
    }


}
