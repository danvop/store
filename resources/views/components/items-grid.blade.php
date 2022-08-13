@props(['items'])
    <div class="lg:grid lg:grid-cols-6">
        @foreach($items as $item)
            <x-item-card
                :item="$item"
            />
        @endforeach
    </div>

