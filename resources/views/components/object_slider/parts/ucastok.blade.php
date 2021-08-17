<div class="col-lg-6 d-flex align-items-center" data-option="ploshhad">
    <div class="content-specials-pref-list-info__ico" style="color: #C1A771">
        <x-icon name="ploshhad" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            {{-- {{print_r($slider_item->options['ploshad']->value, true)}} --}}
            @if (isset($slider_item->options['ploshhad']))
                {{ $slider_item->options['ploshhad']->value }}
            @else
                {{ $slider_item->square ?? '-' }}
            @endif
            м<sup>2</sup>

        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="kategoria">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="kategoria" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['kategoria']))
                {{ $slider_item->options['kategoria']->value }}
            @else
                -
            @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="do-morya">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="do-morya" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['do-morya']))
            {{ $slider_item->options['do-morya']->value }}
        @else
            -
        @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="centr_goroda">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="centr_goroda" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['centr_goroda']))
                {{ $slider_item->options['centr_goroda']->value }}
            @else
            {{ $slider_item->bed_rooms ?? '-' }}
            @endif
        </div>
    </div>
</div>
