@props(['store'])
<div>
    @if($store->parents->count())
        @foreach($store->parents as $parent)
        {{-- last foreach element without "/" --}}
            @if ($loop->last)
                <a class="italic text-xs text-blue-800" href="/stores/{{ $parent->hashid }}">{{ $parent->name }}</a>
            @else
                <a class="italic text-xs text-blue-800" href="/stores/{{ $parent->hashid }}">{{ $parent->name }}/</a>
            @endif
        @endforeach
    @endif
</div>
