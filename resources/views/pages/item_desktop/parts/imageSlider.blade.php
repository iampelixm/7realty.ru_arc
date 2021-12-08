            <div class="item_slider" style="width: 800px">

                <div id="" class="owl-carousel slider1" onclick="">
                    @foreach ($item->imagesActive as $key => $image)
                        <div class="item">

                            <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" />
                        </div>
                    @endforeach

                </div>
                <div class="slider-content">
                    <h2 class="big-slide-image-div__h2">{{ $item->name ?? '' }}</h2>
                    <h3 class="big-slide-image-div__h3">{{ $item->address ?? 'Ф' }}</h3>
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
