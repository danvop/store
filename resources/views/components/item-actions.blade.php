<form action="/item/{{$item->hashid}}/delete" method="post">
    @csrf
    <input type="hidden" name="store_id" value={{ $item->store->hashid }}>
    <button class="p-1 bg-red-300 rounded">Delete</button>
</form>

{{-- if Archive
    add button Restore
    Do not show button Delete
    --}}
