@php
    $storeFullName= $storeFullName.'/'.$child_store->name;
@endphp
<li>{{ $storeFullName }} (store id: {{ $child_store->id }})</li>
@if ($child_store->stores)
    <ul>
        @if ($child_store->items)
            @foreach ($child_store->items as $item)
            <li>{{ $item->name }} (item id: {{ $item->id }})</li>
            @endforeach

        @endif
        @foreach ($child_store->stores as $childStore)
            @include('child_store', ['child_store' => $childStore])
        @endforeach
    </ul>
@endif
