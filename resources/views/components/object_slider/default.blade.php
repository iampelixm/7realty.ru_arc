<div class="content-specials-list-slider-info">
    <div class="content-specials-heart {{in_array($slider_item->id, $massFav) ? 'active' : ''}}">
        <x-icon name="heart" width="40" height="40" />
    </div>
    <div class="slide-image-div">
        @foreach ($slider_item->imagesActive->take(3) as $key2 => $slider_item_image)
            <a href="{{ route('site.item.get', $slider_item->slug) }}">
                <div class="slide-image-div-image">
                    <img src="{{ url('storage/items/' . $slider_item->id . '/' . $slider_item_image->file) }}">
                </div>
            </a>
        @endforeach
    </div>

    <div class="content-specials-list-slider-info-options">
        <div class="content-specials-price">
            <p class="content-specials-price__p"><a href="@if ($slider_item->slug != null) {{ route('site.item.get', $slider_item->slug) }} @endif">{{ $slider_item->name }}</a></p>
        </div>
        <div class="content-specials-adress">
            <div class="content-specials-pointer content-specials-pointer_position"><i
                    class="fas fa-map-marker-alt"></i>
            </div>
            <div>
                <p class="content-specials__p">{{ $slider_item->address }}</p>
            </div>
        </div>

        <hr style="color: #EEE; width: 100%">

        <div class="content-specials-pref row no-gutters">

            @foreach ($slider_item->options as $itemOptionName => $itemOption)
                <div class="col-lg-6 d-flex" data-option="{{ $itemOptionName }}">
                    <div class="content-specials-pref-list-info__ico">
                        <x-icon :name="$itemOptionName" height="20" width="20" />
                    </div>
                    <div>
                        <div class="content-specials-pref-list-info__text">
                            {{ $itemOption->value_title }}
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="content-specials-pref-list">
            <div class="content-specials-pref-list-info">
                <div class="content-specials-pref-list-info__ico">
                    @include('components.svg.square')
                </div>
                <div class="content-specials-pref-list-info__text">{{ $slider_item->square }} м²</div>
            </div>
            <div class="content-specials-pref-list-info">
                @if ($slider_item->bed_rooms != null && $slider_item->bed_rooms > 0)
                    <div class="content-specials-pref-list-info__ico">
                        @include('components.svg.bed_rooms')
                    </div>
                    <div class="content-specials-pref-list-info__text">
                        {{ trans_choice('site.bed_rooms', $slider_item->bed_rooms, ['value' => $slider_item->bed_rooms]) }}
                    </div>
                @endif
            </div>
        </div> --}}
        </div>

        <hr style="color: #EEE; width: 100%;">

        <div class="content-specials-choice">
            <div class="content-specials-price-info d-flex align-items-center">
                <div class="content-specials-price-in">
                    <x-icon name="item-price" height="24" />
                </div>
                    <p class="content-specials-price-info__p">{{ number_format($slider_item->price, 0, ',', ' ') }} ₽
                    </p>
                {{-- <div class="content-specials-link"><button class="content-specials-link__button"
                    onclick="showModal({{ $slider_item->id }})">Отправить запрос</button></div> --}}
                {{-- <div class="content-specials-link"><button class="content-specials-link__button"
                    onclick="location.href='{{ route('site.item.get', $slider_item->slug) }}'">Узнать подробнее</button></div> --}}

            </div>

            {{--  --}}
        </div>
    </div>
</div>
