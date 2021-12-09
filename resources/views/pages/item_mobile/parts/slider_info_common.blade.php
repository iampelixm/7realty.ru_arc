<h2 class="content-object-card-information-title">
    {{ $item->name }}
</h2>

<div class="d-flex pl-2">
    <div class="content-object-card-information-icon">
        @section('price-icon')
            <x-icon name="item-price" />
        @show
    </div>
    <div>
        <div class="content-object-card-information-list-text-tile">
            @if ($item->type_order == 'sale')
                Цена
            @elseif ($item->type_order == 'orenda')
                Аренда в месяц
            @endif
        </div>
        <div class="content-object-card-information-list-text-info" style="font-size: 36px">
            @section('price')
                @if ($item->price)
                    {{ number_format($item->price, 0, ',', ' ') }} ₽
                @else
                    По запросу
                @endif
            @show
        </div>
    </div>
</div>

<hr color="#C1A771">

<div class="row" data-type="{{$item->type->slug}}">
    @section('options')
    @foreach ($item->options as $itemOptionName => $itemOption)
        <div class="col-lg-6 d-flex" data-option="{{$itemOptionName}}">
            <div class="content-object-card-information-icon">
                <x-icon :name="$itemOptionName" height="50" width="50"/>
            </div>
            <div>
                <div class="content-object-card-information-list-text-tile">
                    {{ $itemOption->name }}
                </div>
                <div class="content-object-card-information-list-text-info">
                    {{ $itemOption->value }}
                </div>
            </div>
        </div>
    @endforeach
    @show
</div>
