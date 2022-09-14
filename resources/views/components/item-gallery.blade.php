@props(['item'])
<div class="grid grid-cols-12">

    <div
        x-data="photoGallery"
        class="col-span-12 x-data"
    >

        <div>
            <img
            x-ref="mainImage"
            class="rounded-xl"
            src=""
            {{-- loading="lazy" --}}
            />
        </div>
        <div class="flex flex-wrap">
            @for($i=0; $i<$item->photos->count(); $i++)
                <img
                    src="/thumbnails/{{ $item->photos[$i]->path }}"
                    alt=""
                    class="m-1 rounded-xl"
                    :class="{'opacity-50': currentPhoto == {{$i}}}" class="w-16 h-16" x-on:click="pickPhoto({{$i}})"
                >
            @endfor
        </div>

    </div>
</div>

<script>

    document.addEventListener('alpine:init', () => {
        Alpine.data('photoGallery', () => ({
        currentPhoto: 0,
        // array of photos paths
        photos: @js($item->photos()->pluck('path')),
        init() { this.changePhoto(); },
        changePhoto() {
            this.$refs.mainImage.src = '/photos/' + this.photos[this.currentPhoto];
        },
        pickPhoto(index) {
            this.currentPhoto = index;
            this.changePhoto();
        }
        }))
    })
</script>
