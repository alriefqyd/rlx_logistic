<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Price;
use App\Models\User;
use App\Services\AdminPriceService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class AdminPriceController extends Controller
{
    /**
     * price list for corporate
     */
    public function corporate(Request $request){
        $this->authorize('harga-corporate');
        $corporateList = Price::with(['companyBy.profile','originLocation.city.province','destinationLocation.city.province'])
            ->whereHas('companyBy');
        $userService = new UserService();

        if($userService->isUserHaveAccess(['ROLE_CORPORATE']) &&
            !$userService->isUserHaveAccess(['ROLE_ADMIN'])){
            $corporateList->where('company', auth()->user()->id);
        }

        $companyFilter = $corporateList->get()->groupBy('company');
        $destination = $corporateList->get()->groupBy('destination_location');
        $origin = $corporateList->get()->groupBy('origin_location');
        $roleUser = $userService->getUserRole();



        /*
         * whereHas to check if the price is exist
         * paginate for pagination with parameter number per page
         * withQueryString is to get all query string url in pagination
         */
        return(view('admin.price.corporateList',[
            'corporatePriceList' => $corporateList->filter(request(['company','origin','destination']))
                ->paginate(10)->withQueryString(),
            'companyFilter' => $companyFilter,
            'destination'=> $destination,
            'origin' => $origin,
            'role' => $roleUser,

        ]));
    }

    /**
     * price list for regular
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function regular(Request $request){
        $this->authorize('harga-regular');
        $userService = new UserService();
        $userPrice = Price::with(['createdBy.profile','originLocation.city.province','destinationLocation.city.province'])
            ->where('isRegularPrice',true);
        $destination = $userPrice->get()->groupBy('destination_location');
        $origin = $userPrice->get()->groupBy('origin_location');
        return(view('admin.price.list',[
            'data' => $userPrice->filter(request(['company','destination','origin']))->paginate(10)->withQueryString(),
            'destination'=> $destination,
            'origin' => $origin,
            'active' => true,
        ]));
    }

    public function create(){
        $url = request()->segment(3);
        $isRegularPrice = false;

        $price = new Price();
        if($url == 'regular'){
            $isRegularPrice = true;
        }

        $company = User::with('roles','profile')->whereHas('roles',function($q){
            return $q->where('authority', 'ROLE_CORPORATE');
        })->get();

        $userService = new UserService();
        $isRoleCorporate = $userService->isUserHaveAccess(['ROLE_CORPORATE']);

        $layanans = Layanan::all();

        return view('admin.price.create',[
            'formUrl' => $isRegularPrice ? 'regular' : 'corporate',
            'isRegular' => $isRegularPrice,
            'company' => $company,
            'companyUser' => $company->where('id',auth()->user()->id)->first(),
            'isRoleCorporate' => $isRoleCorporate,
            'corporateId' => $isRoleCorporate ? auth()->user()->id : null,
            'layanans' => $layanans,
            'price' => $price
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = request()->segment(3);
        $isRegularPrice = false;
        $price = new Price();
        if($url == 'regular'){
            $isRegularPrice = true;
            $price->regular_price = $request->regular_price;
        } else {
            $price->price = $request->company_price;
            $price->company = $request->company;
        }

        $priceService = new AdminPriceService();
        $priceService->priceValidate($request->company,$request->layanan, null);

        $validator = $this->validate($request, array(
            'destination' => ['required'],
            'origin' => ["required", "uniqueOriginAndDestination:{$request->destination}"],
        ));

        $price->origin_location = $request->origin;
        $price->destination_location = $request->destination;
        $price->created_by = auth()->user()->id;
        $price->isRegularPrice = $isRegularPrice;
        $price->layanan = $request->layanan;
        $save = $price->save();
        if($save){
            toastr()->success('Data has been saved successfully!');
            return redirect('admin/prices/'.$url);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        $userService = new UserService();
        $isRegularPrice = true;
        $url = request()->segment(3);
        if($url === 'corporate'){
            $isRegularPrice = false;
            if($price->isRegularPrice){
                abort(404);
            }

            if(!Gate::allows('harga-corporate')){
                return abort(403);
            }
        }

        if($url === 'regular'){
            if(!$price->isRegularPrice){
                abort(404);
            }

            if(!Gate::allows('harga-regular')){
                return abort(403);
            }
        }

        $isRoleCorporate = $userService->isUserHaveAccess(['ROLE_CORPORATE']);
        $company = User::with('roles','profile')->whereHas('roles',function($q){
            return $q->where('authority', 'ROLE_CORPORATE');
        })->get();

        return view('admin.price.detail',[
            'url' => $url,
            'price' => $price,
            'company' => $company,
            'layanan' => Layanan::all(),
            'isRegularPrice' => $isRegularPrice,
            'isRoleCorporate' => $isRoleCorporate,
            'corporateId' => $isRoleCorporate ? auth()->user()->id : null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $prices = Price::find($request->price);
        if(!$prices){
            abort(500);
        }

        $isRegularPrice = false;
        $url = request()->segment(3);

        if($url == 'regular'){
            $isRegularPrice = true;
            $prices->regular_price = $request->regular_price;
        } else {
            $prices->price = $request->company_price;
            $prices->company = $request->company;
        }

        $priceService = new AdminPriceService();
        $priceService->priceValidate($request->company,$request->layanan,$request->price);

        $validator = $this->validate($request, array(
            'destination' => ['required'],
            'origin' => ["required", "uniqueOriginAndDestination:{$request->destination}"],
        ));

        $prices->origin_location = $request->origin;
        $prices->destination_location = $request->destination;
        $prices->created_by = auth()->user()->id;
        $prices->isRegularPrice = $isRegularPrice;
        $prices->layanan = $request->layanan;
        $prices->save();

        toastr()->success('Data has been update successfully!');
        return redirect('admin/prices/'.$url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }

    public function getPriceByLocation(Request $request){
        $priceService = new AdminPriceService();
        $origin = request('origin');
        $destination = request('destination');
        $get_regular_price = $priceService->getRegularPrice($origin, $destination, false);
        $data = [
            'price' => $get_regular_price ? $get_regular_price->regular_price : null
        ];
        if(request('company') && request('company') != null){
            $corporatePrice = $priceService->getCorporatePrice($request);
            $data = [
                'price' => $corporatePrice->price ?? $get_regular_price->regular_price
            ];
        }
        return response()->json($data);
    }

    /*public function getLocationValidation(Request $request){
        $priceBaseOnLocation = Price::where('origin_location',$request->origin)->
            where('destination_location',$request->destination)->
            where('isRegularPrice',$request->isRegularPrice)->get();

        $data = [
            'isExist' => sizeof($priceBaseOnLocation) > 0
        ];

        return response()->json($data);
    }*/


}
