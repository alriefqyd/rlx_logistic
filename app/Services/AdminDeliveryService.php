<?php


namespace App\Services;


use App\Models\Delivery;
use Illuminate\Support\Facades\Gate;

class AdminDeliveryService
{

    public function getDelivery(){
        $delivery = Delivery::with(['company.profile','createdBy.profile'])->filter(request(['no','startDate','endDate']));
        if (Gate::any(['corporate'])) {
            $delivery->where('company_by', auth()->user()->id);
        }
        return $delivery;
    }

}
