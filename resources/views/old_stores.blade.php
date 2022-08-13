@extends('layout')
{{-- {{dd($stores)}} --}}
@section('content')
{{-- {{dd($stores)}} --}}
{{-- {{dd($stores)}} --}}
{{-- {{dd($stores)}}
 --}}


@foreach ($stores as $store)
<p>=========================</p>
<p>Store : {{ $store->name }} </p>
@foreach ($store->items as $item)
    <p>Item {{ $loop->iteration }} : {{ $item->name }} </p>
    @foreach ($item->photos as $photo)
        <p>Photo {{ $loop->iteration }} : {{ $photo->path }} </p>
    @endforeach
@endforeach
@endforeach


{{-- @foreach ($stores as $store)
    <p>Store: {{ $store->name }} </p>
@endforeach --}}

