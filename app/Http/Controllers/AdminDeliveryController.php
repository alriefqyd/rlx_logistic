<?php

namespace App\Http\Controllers;

use App\Exports\DeliveryExport;
use App\Models\Consignment;
use App\Models\Delivery;
use App\Models\Layanan;
use App\Models\Setting;
use App\Models\User;
use App\Services\AdminDeliveryService;
use App\Services\UserService;
use Carbon\Carbon;
use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Indonesia;
use Illuminate\Support\Facades\Response;
use Laravolt\Indonesia\IndonesiaService;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Picqer\Barcode\Barcode;
use Picqer\Barcode\BarcodeGeneratorHTML;
use \GuzzleHttp\Exception\RequestException;

class AdminDeliveryController extends Controller
{
    private $client;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('delivery');
        $userService = new UserService();
        $deliveryService = new AdminDeliveryService();
        $delivery = $deliveryService->getDelivery();

        return view('admin.delivery.list',[
            'delivery' => $delivery->orderBy('created_at', 'DESC')->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('delivery');
        $delivery = new Delivery();
        $layanan = Layanan::all();
        $asuransi = $delivery->asuransi;
        $komoditasCollection = collect([]);
        $komoditas = Setting::where('setting_type', Setting::KOMODITAS)->first();
        $c = json_decode($komoditas->setting_value);
        for($i=0;$i<count($c);$i++){
            $obj = $c[$i];
            $komoditasCollection ->push([
               'key' => $obj->key,
                'value' => $obj->value
            ]);
        }
        $company = User::with('roles','profile')->whereHas('roles',function($q){
            return $q->where('authority', 'ROLE_CORPORATE');
        })->get();
        return view('admin.delivery.create',[
            'layanan' => $layanan,
            'delivery' => $delivery,
            'asuransi' => $asuransi,
            'komoditas' => $komoditasCollection,
            'company' => $company
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
        DB::beginTransaction();
        $data = $this->validate($request,[
            'stt' => 'required|unique:deliveries',
            'noReferensiExternal' => 'required|unique:deliveries',
            'layanan' => 'required',
            'senderName' => 'required',
            'recipientName' => 'required',
            'addressSender' => 'required',
            'addressRecipient' => 'required',
            'phone_sending_by' => 'required',
            'phone_recipient' => 'required',
            'komoditas' => 'required',
            'asuransi_pengiriman' => 'required',
            'harga' => 'required',
            'npwp' => 'required',
            'berat_barang' => 'required',
            'dimensi' => 'required',
            'origin' => 'required',
            'destination' => 'required'
        ]);

        try{
            $delivery = new Delivery();
            $delivery->stt = $request->stt;
            $delivery->noReferensiExternal = $request->noReferensiExternal;
            $delivery->origin = $request->origin;
            $delivery->destination = $request->destination;
            $delivery->senderName = $request->senderName;
            $delivery->recipientName = $request->recipientName;
            $delivery->addressSender = $request->addressSender;
            $delivery->addressRecipient = $request->addressRecipient;
            $delivery->phone_sending_by = $request->phone_sending_by;
            $delivery->phone_recipient = $request->phone_recipient;
            $delivery->komoditas = $request->komoditas;
            $delivery->asuransi_pengiriman = $request->asuransi_pengiriman;
            $delivery->harga = $request->harga;
            $delivery->npwp = $request->npwp;
            $delivery->sending_price = $request->sending_price;
            $delivery->transaction_type = $request->print_resi;
            $delivery->created_by = auth()->user()->id;
            $delivery->layanan_id = $request->layanan;
            $delivery->company_sender = $request->company_sender;

            $delivery->total_packet = $request->total_packet;
            $delivery->actual_weight = $request->actual_weight;
            $delivery->dimension_weight = $request->dimension_weight;
            $delivery->insurance = $request->insurance;
            $delivery->ppn = $request->ppn;
            $delivery->total_price = $request->total_price;


            $delivery->saveOrFail();
            for($i=0;$i<count($request['berat_barang']);$i++){
                $consignment = new Consignment([
                    'berat_barang' => $request['berat_barang'][$i],
                    'dimensi' =>  $request['dimensi'][$i],
                    'berat_volume' => $request['berat_volume'][$i]
                ]);
                $delivery->consignments()->save($consignment);
            }
            DB::commit();
            if($request->print_resi == 'true'){
//                $pdf = PDF::loadView('admin/delivery/resi', array('delivery' => $delivery));
                toastr()->success('Data Booking Berhasil Disimpan');
                return redirect('/admin/delivery/print-resi/'.$delivery->id);
//                return $pdf->stream('resi.pdf',array('Attachment'=>0));
            }
            toastr()->success('Data Booking Berhasil Disimpan');
            return redirect('/admin/delivery');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect('/admin/delivery/create')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery){
        $this->authorize('delivery');
        $delivery->load(['cityOrigin','cityDestination']);
        return view('admin.delivery.detail',[
            'delivery' => $delivery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $layanan = Layanan::all();
        $asuransi = $delivery->asuransi;
        $komoditasCollection = collect([]);
        $komoditas = Setting::where('setting_type', Setting::KOMODITAS)->first();
        $c = json_decode($komoditas->setting_value);
        for($i=0;$i<count($c);$i++){
            $obj = $c[$i];
            $komoditasCollection->push([
                'key' => $obj->key,
                'value' => $obj->value
            ]);
        }
        $company = User::with('roles','profile')->whereHas('roles',function($q){
            return $q->where('authority', 'ROLE_CORPORATE');
        })->get();
        $this->authorize('delivery');
        $delivery->load(['cityOrigin','cityDestination']);
        $consignment = $delivery->consignments;

        $totalBerat = 0;
        foreach ($consignment as $c){
            $totalBerat += $c->berat_barang;
        }

        $totalBeratVolume = 0;
        foreach ($consignment as $c){
            $totalBeratVolume += $c->berat_volume;
        }

        $beratDikenakanBiaya = max($totalBerat,$totalBeratVolume);
        $totalPrice = ($beratDikenakanBiaya * $delivery->sending_price) + $delivery->insurance + $delivery->ppn;



        return view('admin.delivery.edit',[
            'delivery' => $delivery,
            'layanan' => $layanan,
            'company' => $company,
            'komoditas' => $komoditasCollection,
            'asuransi' => $asuransi,
            'consignment' => $consignment,
            'totalBerat' => $totalBerat,
            'beratVolume' => $totalBeratVolume,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $delivery = Delivery::find($request->delivery);
        $delivery->noReferensiExternal = $request->noReferensiExternal;
        $delivery->origin = $request->origin;
        $delivery->destination = $request->destination;
        $delivery->senderName = $request->senderName;
        $delivery->recipientName = $request->recipientName;
        $delivery->addressSender = $request->addressSender;
        $delivery->addressRecipient = $request->addressRecipient;
        $delivery->phone_sending_by = $request->phone_sending_by;
        $delivery->phone_recipient = $request->phone_recipient;
        $delivery->komoditas = $request->komoditas;
        $delivery->asuransi_pengiriman = $request->asuransi_pengiriman;
        $delivery->harga = $request->harga;
        $delivery->npwp = $request->npwp;
        $delivery->sending_price = $request->sending_price;
        $delivery->transaction_type = $request->print_resi;
        $delivery->created_by = auth()->user()->id;
        $delivery->layanan_id = $request->layanan;
        $delivery->company_sender = $request->company_sender;

        $delivery->total_packet = $request->total_packet;
        $delivery->actual_weight = $request->actual_weight;
        $delivery->dimension_weight = $request->dimension_weight;
        $delivery->insurance = $request->insurance;
        $delivery->ppn = $request->ppn;
        $delivery->total_price = $request->total_price;

        $delivery->saveOrFail();
        for($i=0;$i<count($request['berat_barang']);$i++){
            if(isset($request['consignment_id'][$i])){
                $consignment = Consignment::find($request['consignment_id'][$i]);
                $consignment->update([
                    'berat_barang' => $request['berat_barang'][$i],
                    'dimensi' => $request['dimensi'][$i],
                    'berat_volume' => $request['berat_volume'][$i]
                ]);
            } else {
                $consignment = new Consignment([
                    'berat_barang' => $request['berat_barang'][$i],
                    'dimensi' =>  $request['dimensi'][$i],
                    'berat_volume' => $request['berat_volume'][$i]
                ]);
                $delivery->consignments()->save($consignment);
            }
        }
        DB::commit();
        toastr()->success('Data Booking Berhasil Di update');
        return redirect('/admin/delivery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    public function getApiInvoice($invoice){
        $url = Config::get('constants.api.invoice_track.url');
        $api_key = Config::get('constants.api.invoice_track.api_key');
        $client = new Client(['base_uri' => $url]);
        $data = null;
        try {
            $data = $client->request('GET', 'v1/track', [ // Get data from external api
                'query' => [
                    'api_key' => $api_key,
                    'courier' => 'lion',
                    'awb' => $invoice
                ]
            ]);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return $result = [
                    'status' => 400,
                    'message' => 'Data Not Found'
                ];
            }
        }

        return $result = [
            'data' => $data->getBody()->getContents(),
            'status' => 200
        ];
    }

    public function getLocation(Request $request){
        $key = request('q');
        $data = Indonesia::findDistrictByKey($key);
        return response()->json($data);
    }

    public function printResi(Delivery $delivery){
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($delivery->stt, $generator::TYPE_CODE_128);
        return view('admin/delivery/resi',[
            'delivery' => $delivery,
            'barcode' => $barcode
        ]);
    }

    public function export(Request $request)
    {
        $name = Carbon::now();
        $start = $request->startDate;
        $end = $request->endDate;
        $stt = $request->stt;
        return Excel::download(new DeliveryExport($start,$end, $stt, $request), 'delivery-'.$name.'.xlsx');
    }

    public function getDataDelivery(Request $request){
        $key = $request->name;
        $column = 'recipientName';
        if($request->isSender === 'true'){
            $column = 'senderName';
        }
        $data = Delivery::where($column,$key)->orderBy('created_at','DESC')->first();
        return response()->json($data);
    }

}
