<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::whereNull('parent_id')
            ->with('childrenStores')
            ->get();

        return view('stores', compact('stores'));


        // $stores = Store::with('items','parent')
        // ->orderBy('parent_id')
        // ->get();
    }

    // this route resolved from hashids resolveRouteBinding
    public function show(Store $store)
    {
        $store = Store::findOrFail($store->id);
            // ->with('childrenStores')
            // ->get();
        // return $stores;
        $storeFullPath = [];

        return view('store', compact('store'));
    }
}
