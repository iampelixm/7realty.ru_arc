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
                    @include('components.svg.item_square')
                </div>
                <div class="content-specials-pref-list-info__text">
                    @if (isset($slider_item->options['minimalnaya_ploshhad']))
                        {{ $slider_item->options['minimalnaya_ploshhad']->value_title ?? '--' }}
                    @else
                        --
                    @endif
                    м²
                </div>
            </div>
            <div class="content-specials-pref-list-info">
                <div class="content-specials-pref-list-info__ico">
                    @include('components.svg.item_square')
                </div>
                <div class="content-specials-pref-list-info__text">
                    @if (isset($slider_item->options['maksimalnaya_ploshhad']))
                        {{ $slider_item->options['maksimalnaya_ploshhad']->value_title ?? '--' }}
                    @else
                        --
                    @endif
                    м²
                </div>
            </div>
        </div>
        <div class="content-specials-pref-list">
            <div class="content-specials-pref-list-info">
                <div class="content-specials-pref-list-info__ico">
                    @include('components.svg.item_price')
                </div>
                <div class="content-specials-pref-list-info__text">
                    @if (isset($slider_item->options['minimalnaya_cena_za_kvm']))
                        От
                        {{ number_format((int) $slider_item->options['minimalnaya_cena_za_kvm']->value_title ?? 0, 0, ',', ' ') ?? '--' }}
                    @else
                        По запросу за
                    @endif
                    м²
                </div>
            </div>
        </div>
    </div>
    <div class="content-specials-choice">
        <div>
            <div class="content-specials-price-info">
                <p class="content-specials-price-info__p">
                    @if (isset($slider_item->options['minimalnaya_cena_za_kvm']) && isset($slider_item->options['minimalnaya_ploshhad']))
                        От
                        {{ number_format(((int) $slider_item->options['minimalnaya_cena_za_kvm']->value_title ?? 0) * ((int) $slider_item->options['minimalnaya_ploshhad']->value_title ?? 0), 0, ',', ' ') }}
                        ₽
                    @else
                        По запросу
                    @endif
                </p>
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
