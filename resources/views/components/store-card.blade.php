@props(['store'])
<div>
    <div class="border-2 border-black rounded-xl p-1 m-1">
        <p class="font-bold">{{ $store->name }}</p>

         {{-- Stores tree section --}}
         <x-store-parents :store="$store" />

        <div>
            @if ($store->items->count())
                <div class="flex flex-wrap text-sm">
                    @foreach ($store->items as $item)
                        <x-item-card-in-store :item="$item" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-xs">Store is empty yet.</p>
            @endif
        </div>
    </div>
</div>
