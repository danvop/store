@props(['stores', 'storeFullPath'])

@foreach ($stores as $store)

    <div class="p-1 border-b-2">

        {{-- <a href="/stores/{{ $store->hashid }}" class="font-bold">{{ $store->name }}</a> --}}

        <x-store-parents :store="$store" />

        {{-- show items section --}}
        @if($store->items->count())
            <div class="grid grid-cols-6 text-sm">
                @foreach ($store->items as $item)
                    <x-item-card-in-store :item="$item" />
                @endforeach
            </div>
        @endif

        {{-- children stores section --}}
        @if ($store->childrenStores->count())
            @foreach ($store->childrenStores as $store)
                <x-all-child-stores :store="$store"/>
            @endforeach
        @endif

    </div>
    @php
        $storeFullPath = []
    @endphp
@endforeach

