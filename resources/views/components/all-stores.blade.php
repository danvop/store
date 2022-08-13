@props(['stores', 'storeFullPath'])

@foreach ($stores as $store)

    <div class="border-2 border-black rounded-xl p-1">

        <a href="/stores/{{ $store->hashid }}" class="font-bold">{{ $store->name }}</a>

        {{-- Get parents section --}}

        <div>
            @if($store->parents->count())

            @endif
        </div>
        {{-- Stores parents tree section --}}
        <x-store-parents :store="$store" />

        {{-- show items section --}}
        @if($store->items->count())
            <div class="flex flex-wrap text-sm">
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

