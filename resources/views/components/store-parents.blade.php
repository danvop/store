@props(['store'])
<div class="mt-5">
    @if($store->parents->count())
        @foreach($store->parents as $parent)
        {{-- last foreach element without "/" --}}
            {{-- @if ($loop->last)
                <a class="text-xs italic text-blue-800" href="/stores/{{ $parent->hashid }}">{{ $parent->name }}</a>
            @else
                <a class="text-xs italic text-blue-800" href="/stores/{{ $parent->hashid }}">{{ $parent->name }}/</a>
            @endif --}}

            <a class="px-2 font-bold bg-gray-200 rounded-xl" href="/stores/{{ $parent->hashid }}">{{ $parent->name }}</a>
        @endforeach
    @endif
    <a href="/stores/{{ $store->hashid }}" class="px-2 font-bold bg-gray-200 rounded-xl">{{ $store->name }}</a>
</div>
