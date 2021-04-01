<div class="content-list-item-residence content-list-item-residence__modify " data-id="zk{{ $item->id }}"
    data-name="card">
    <div class="slide-image-div">
        @foreach ($item->imagesActive->take(3) as $image)
            <div class="slide-image-div-image">
                <a href=" {{ route('site.residences_items', $item->id) }}">
                    <img src="{{ url('storage/residences/' . $item->id . '/' . $image->file) }}" alt>
                </a>
            </div>
        @endforeach
    </div>
    <h3 class="residential-object__h3 w-100"><a
            href=" {{ route('site.residences_items', $item->id) }}">{{ $item->name }}</a></h3>
    <div class="residential-object-group w-100"><a class="residential-object-group__a"
            href="{{ route('site.residences_items', $item->id) }}#residence_items">
            @if ($item->items->count() > 0)
            {{ trans_choice('site.objects', $item->items->count(), ['value' => $item->items->count()]) }} @else
                Нет объектов @endif
        </a></div>
    <div class="residential-object-adress w-100">
        <div class="residential-object-adress-marker"><i class="fas fa-map-marker-alt"></i></div>
        <div class="residential-object-adress-text">
            <p>{{ $item->address }}</p>
        </div>
    </div>
    <div class="residential-object-info">
        <div class="residential-object-info-image">
            @include('components.svg.res_square')
        </div>
        <div class="residential-object-info-text">
            <p>{{ $item->minSquare }} м² - {{ $item->maxSquare }} м²</p>
        </div>
    </div>
    <div class="residential-object-price-wrapper">
        <div class="residential-object-price">
            <div class="residential-object-price-image">
                @include('components.svg.res_item_price')
            </div>
            <div class="residential-object-price__sub">От: </div>
            <div class="residential-object-price-text">
                <p>{{ number_format($item->minPrice, 0, ',', ' ') }} ₽</p>
            </div>
        </div>
        <div class="residential-object-price">
            <div class="residential-object-price-image"></div>
            <div class="residential-object-price__sub">До: </div>
            <div class="residential-object-price-text">
                <p>{{ number_format($item->maxPrice, 0, ',', ' ') }} ₽</p>
            </div>
        </div>
    </div>
</div>
