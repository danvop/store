@if($store ?? false)
    {{-- add item button --}}
    <a href="/item/{{$store->hashid}}/create"
    class="p-1 bg-green-300 rounded"
    >Add item</a>
    {{-- add store button --}}
    <a href="/store/{{$store->hashid}}/create"
        class="p-1 bg-green-300 rounded"
    >Add substore</a>
    {{-- delete store button --}}
    <a href="/store/{{$store->hashid}}/delete"
            class="p-1 bg-red-300 rounded"
    >Remove store</a>
@else
    {{-- add item button --}}
    <a href="/item/create"
    class="p-1 bg-green-300 rounded"
    >Add item</a>
    {{-- add store button --}}
    <a href="/store/create"
            class="p-1 bg-green-300 rounded"
        >Add store</a>


@endif
