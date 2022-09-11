<div class="p-1 m-1 bg-gray-100 rounded-md">

    <a href="/items/{{ $item->hashid }}">


    @if (!count($item->photos))
    <img
        src="/images/no-image_square.png"
        alt=""
        class="rounded-xl">
    @else
        <img
            src="/photos/{{ $item->photos->first()->path}}"
            alt=""
            class=" rounded-xl">
    @endif
    </a>


    {{ $item->id }}
    <a href="/items/{{ $item->hashid }}">
        {{ $item->name }}
    </a>
</div>
