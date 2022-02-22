<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Price;
use App\Services\AdminPriceService;
use Illuminate\Http\Request;
use Laravolt\Indonesia\IndonesiaService;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;

class AdminHomeController extends Controller
{
    public function index(){

        return view('admin.home',[

        ]);
    }
}
