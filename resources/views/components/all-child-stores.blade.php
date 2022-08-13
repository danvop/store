@props(['store', 'storeFullPath'])

<div class="border-2 border-black rounded-xl p-1 m-1">
    <a href="/stores/{{ $store->hashid }}" class="font-bold">{{ $store->name }}</a>

    {{-- Stores parents tree section --}}
    <x-store-parents :store="$store" />

    @if($store->items->count())
        <div class="flex flex-wrap text-sm">
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

