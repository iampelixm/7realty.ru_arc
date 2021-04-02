            <div class="col-12 col-md-8 px-3 px-md-0">

                <div id="" class="owl-carousel slider1" onclick="">
                    @foreach ($item->imagesActive as $key => $image)
                        <div class="item">

                            <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" />
                        </div>
                    @endforeach

                </div>
                <div class="slider-content">
                    <h3 class="big-slide-image-div__h3">{{ $item->address ?? '' }}</h3>
                    <h2 class="big-slide-image-div__h2">{{ $item->area->name ?? '' }}</h2>
                    {{--<h4 class="big-slide-image-div__h4" onclick="setFavorites({{ $item->id }})"><i
                        class="@if (in_array($item->id, $massFav)) fas @else
                            far @endif
                            fa-heart"></i></h4>--}}
                </div>
                <div id="" class="owl-carousel thumbnails1">

                    @foreach ($item->imagesActive as $key => $image)
                        <div class="item"><img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" />
                        </div>
                    @endforeach
                </div>
            </div>
