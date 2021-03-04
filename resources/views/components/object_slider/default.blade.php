<div class="content-specials-list-slider-info">

    <div class="slide-image-div">
        @foreach ($slider_item->imagesActive->take(3) as $key2 => $slider_item_image)
            <div class="slide-image-div-image">
                <img src="{{ url('storage/items/' . $slider_item->id . '/' . $slider_item_image->file) }}">
            </div>
        @endforeach

    </div>
    <div class="content-specials-price">
        <p class="content-specials-price__p"><a href="@if ($slider_item->slug != null) {{ route('site.item.get', $slider_item->slug) }} @endif">{{ $slider_item->name }}</a></p>
    </div>
    <div class="content-specials-adress">
        <div class="content-specials-pointer content-specials-pointer_position"><i class="fas fa-map-marker-alt"></i>
        </div>
        <div>
            <p class="content-specials__p">{{ $slider_item->address }}</p>
        </div>
    </div>
    <div class="content-specials-pref">
        <div class="content-specials-pref-list">
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
        </div>
        <div class="content-specials-pref-list">
            <div class="content-specials-pref-list-info">
                @if ($slider_item->all_rooms != null && $slider_item->all_rooms > 0)
                    <div class="content-specials-pref-list-info__ico">
                        @include('components.svg.all_rooms')
                    </div>
                    <div class="content-specials-pref-list-info__text">
                        {{ trans_choice('site.all_rooms', $slider_item->all_rooms, ['value' => $slider_item->all_rooms]) }}
                    </div>
                @endif
            </div>
            <div class="content-specials-pref-list-info">
                @if ($slider_item->bath_rooms != null && $slider_item->bath_rooms > 0)
                    <div class="content-specials-pref-list-info__ico">
                        @include('components.svg.bath_rooms')
                    </div>
                    <div class="content-specials-pref-list-info__text">
                        {{ trans_choice('site.bath_rooms', $slider_item->bath_rooms, ['value' => $slider_item->bath_rooms]) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="content-specials-choice">
        <div>
            <div class="content-specials-price-info">
                <p class="content-specials-price-info__p">{{ number_format($slider_item->price, 0, ',', ' ') }} ₽</p>
            </div>
            <div class="content-specials-link"><button class="content-specials-link__button"
                    onclick="showModal({{ $slider_item->id }})">Отправить запрос</button></div>
        </div>
        <div>
            <div class="content-specials-heart"><i class="fa-heart @if (in_array($slider_item->id,
                $massFav)) fas @else far @endif"></i></div>
        </div>
    </div>
</div>
