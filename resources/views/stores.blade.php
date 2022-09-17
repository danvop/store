<x-layout>
    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
    <x-store-actions/>
            @if ($stores->count())

            <x-all-stores :stores="$stores"/>

            @else
                <p class="text-center">No items yet. Please check back later</p>
            @endif

    </main>

</x-layout>


