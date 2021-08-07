<div class="content-specials-list-slider-info">
    <div class="content-specials-heart {{ in_array($slider_item->id, $massFav) ? 'active' : '' }}">
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
            @if (view()->exists('components.object_slider.parts.' . $slider_item->type->slug))
                @include('components.object_slider.parts.'.$slider_item->type->slug)
            @else
                @include('components.object_slider.parts.common')
            @endif
        </div>
        {{$slider_item->type->slug}}
        <hr style="color: #EEE; width: 100%;">

        <div class="content-specials-choice">
            <div class="content-specials-price-info d-flex align-items-center">
                <div class="content-specials-price-in">
                    <x-icon name="item-price" height="24" />
                </div>
                <p class="content-specials-price-info__p">
                    @if (view()->exists('components.object_slider.parts.price_' . $slider_item->type->slug))
                        @include('components.object_slider.parts.price_'.$slider_item->type->slug)
                    @else
                        {{ number_format($slider_item->price, 0, ',', ' ') }} ₽
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
