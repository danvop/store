<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($stores->count())

            @foreach ($stores as $store)

                <x-store-card :store="$store" />

            @endforeach

            @else
                <p class="text-center">You do not have any store. Please create</p>
            @endif

    </main>

</x-layout>
