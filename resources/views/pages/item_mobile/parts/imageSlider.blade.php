<div class="owl-carousel slidethis" data-items="1" data-nav="true" data-margin="0">
    @foreach ($item->imagesActive as $key => $image)
        {{-- <div class="slider_item"> --}}
            <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}"/>
        {{-- </div> --}}
    @endforeach
</div>

