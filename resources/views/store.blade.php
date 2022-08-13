<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div>
            {{-- Stores tree section --}}
            <x-store-parents :store="$store" />
            {{-- Header --}}
            <header class="font-bold border-t-2">{{ $store->name }}</header>
            {{-- Description --}}
            <div>{{ $store->description }}</div>
            <div></div>
            {{-- This store items section  --}}
            @if ($store->items->count())
                <div class="border-t-2">Items:</div>
                <div class="flex flex-wrap text-sm">
                    @foreach ($store->items as $item)
                        <x-item-card-in-store :item="$item" />
                    @endforeach
                </div>
            @endif
        </div>




        {{-- child stores section --}}
        @if ($store->childrenStores->count())
            <div>
                substores:
            </div>
            @php
                $stores = $store->childrenStores
            @endphp
            <x-all-stores :stores="$stores"/>

        @endif

    </main>

</x-layout>
