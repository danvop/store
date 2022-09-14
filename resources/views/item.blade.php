<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 space-y-6 lg:mt-20">
            <article class="grid max-w-4xl grid-cols-12 mx-auto gap-x-10">
                <div class="col-span-4 mb-10 text-center">

                    @if (!count($item->photos))
                    <img
                        src="/images/no-image-found-360x250.png"
                        alt=""
                        class="rounded-xl">
                    @else
                    <x-item-gallery :item="$item"/>


                    @endif
                    <p class="block mt-4 text-xs text-gray-400">
                        Published <time>{{ $item->created_at->diffForHumans() }}</time>
                    </p>

                </div>

                <div class="col-span-8">
                    <div class="justify-between hidden mb-6 lg:flex">
                        <a href="/stores/{{ $item->store->hashid }}"
                            class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Store
                        </a>

                        <div class="space-x-2">
                            <x-store-button :store="$item->store"/>
                        </div>
                    </div>

                    <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                        {{ $item->name }}
                    </h1>

                    <div class="space-y-4 leading-loose lg:text-lg">{{ $item->description }}</div>
                </div>
            </article>



        </main>
    </section>
</x-layout>
