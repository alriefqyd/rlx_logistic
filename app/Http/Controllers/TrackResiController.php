<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TrackResiController extends Controller
{
    public function search(Request $request){
        $invoice = request('resi');
        $api = $this->getApiInvoice($invoice);
        if($api['status'] == 200){
            $data = json_decode($api['data'], true);
            return view('admin.track.detail', [
                'invoice' => $data,
                'summary' => $data['data']['summary'],
                'status' => $data['data']['summary']['status'],
                'detail' => $data['data']['detail'],
                'history' => $data['data']['history'],
            ]);
        } else {
            return view('admin.track.detail', [
                'invoice' => null
            ]);
        }
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
        } catch (\GuzzleHttp\Exception\RequestException $e) {
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
}
