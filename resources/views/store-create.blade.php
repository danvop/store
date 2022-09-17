<x-layout>
    <form action="/store/store" method="post">
        @csrf
        <div class="mb-6">
            <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="name">
                {{ __('name') }}
            </label>
            <input class="w-full p-2 border border-gray-400 rounded"
                autofocus="autofocus"
                type="text"
                id="name"
                name="name"
                value=""
                required
            >
            @error('name')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="description">
                {{ __('description') }}
            </label>
            <input class="w-full p-2 border border-gray-400 rounded"
                type="text"
                id="description"
                name="description"
                value=""

            >
            @error('description')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
</x-layout>
