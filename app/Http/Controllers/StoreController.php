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

    public function create(Store $store = null)
    {
        return view('store-create', compact('store'));
    }

    public function store(Store $store = null)
    {
        request()->validate([
            'name'=>'required'
        ]);

        //user can't create store of another user
        //user can add substore
        //if user add substore, check user-id, If he isn't owner -> create by owner's ID

        //user can't create store in unsorted and in archive store

        // validate exclude user first and second store
        // error exception
        $storeid = $store->id ?? null;
        // dd($storeid);
        Store::create([
            'user_id' => 1,
            'parent_id' => $storeid,
            'name' => request('name'),
            'description' => request('description')
        ]);

        //if substore -> redirect to parental store
        //if not -> redirect to all stores
        if($store) return redirect("/stores/$store->hashid");
        return redirect('/all');
    }
}
