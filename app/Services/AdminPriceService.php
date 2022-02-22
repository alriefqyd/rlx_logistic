<?php


namespace App\Services;


use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Boolean;

class AdminPriceService
{
    public function priceValidate($company, $layanan, $id){
        $rule =  Validator::extend('uniqueOriginAndDestination', function ($attribute, $value, $parameters, $validator)
        use ($company, $layanan, $id) {
            $count = Price::where('origin_location', $value)
                ->where('destination_location', $parameters[0])
                ->where('layanan',$layanan);
                if($company){
                    $count->where('company', $company);
                }
                if($id){
                    $count->where('id', '!=' , $id);
                }
            return $count->where('isRegularPrice', $company ? false : true)->count() === 0;
        },'Lokasi Asal Dan Tujuan Pengiriman Sudah Ada');

        return $rule;
    }

    public function getRegularPrice($origin, $destination, $service, $isCorporateRegular){
        $price = Price::with('originLocation.city.province','destinationLocation.city.province')
            ->where('origin_location',$origin)
            ->where('destination_location',$destination)
            ->where('layanan', $service)
            ->where('isRegularPrice',true);
        return $price->first();

    }

    public function getCorporatePrice(Request $request){
        $origin = request('origin');
        $destination = request('destination');
        $data = Price::with('originLocation.city.province','destinationLocation.city.province')
            ->where('origin_location',$origin)
            ->where('destination_location',$destination)
            ->where('layanan',request('service'))
            ->where('company',request('company'))
            ->first();

        return $data;
    }


}
