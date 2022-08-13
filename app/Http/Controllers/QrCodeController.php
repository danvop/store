<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index(Store $store)
    {
        // dd($id);
        return view('qrcode', compact('store'));
    }
}
