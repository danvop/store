<div class="bg-gray-100 p-1 rounded-md m-1">
    {{ $item->id }}
    <a href="/items/{{ $item->hashid }}">
        {{ $item->name }}
    </a>
</div>
