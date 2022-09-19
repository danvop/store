<x-layout>
    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
        <div>
            {{-- Stores tree section --}}
            <x-store-parents :store="$store" />
            {{-- Header --}}
            <header class="font-bold border-t-2 bg-gray-50">{{ $store->name }}</header>
            {{-- Description --}}
            <div>{{ $store->description }}</div>
            <div></div>
            {{-- This store items section  --}}
            @if ($store->items->count())
                <div class="border-t-2">Items:</div>
                <div class="grid grid-cols-6 text-sm">
                    @foreach ($store->items as $item)
                        <x-item-card-in-store :item="$item" />
                    @endforeach
                </div>
            @endif
        </div>


        <a
        href="/store/{{$store->hashid}}/create"
        class="p-1 bg-green-300 rounded"
        >Add substore</a>


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
