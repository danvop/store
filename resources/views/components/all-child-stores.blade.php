@props(['store', 'storeFullPath'])

<div class="
            {{-- p-1 border-b-2 --}}
            ">


    {{-- Stores parents tree section --}}
    <x-store-parents :store="$store" />



    @if($store->items->count())
        <div class="grid grid-cols-6 text-sm">
            @foreach ($store->items as $item)
                <x-item-card-in-store :item="$item" />
            @endforeach
        </div>
    @endif

    @if ($store->childrenStores->count())
        @foreach ($store->childrenStores as $store)
            <x-all-child-stores :store="$store" />
        @endforeach
    @endif

</div>

