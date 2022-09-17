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

    public function create()
    {
        return view('store-create');
    }

    public function store()
    {
        request()->validate([
            'name'=>'required'
        ]);

        Store::create([
            'user_id' => 1,
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/all');
    }
}
