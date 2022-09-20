<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Store;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function show(Item $item)
    {
        // return $item;

        return view('item', [
        'item' => $item
    ]);
    }

    public function create(Store $store = null)
    {
        return view('item-create', ['store' => $store]);
    }

    public function store(Store $store = null)
    {
        request()->validate([
            'name'=>'required'
        ]);
        // if store = null get the first user store(unsorted)
        $storeid = $store->id ?? Store::first()->id;

        Item::create([
            'store_id' => $storeid,
            'name' => request('name'),
            'description' => request('description')
        ]);
        if($store) return redirect("/stores/$store->hashid");
        return redirect('/all');
    }
}
