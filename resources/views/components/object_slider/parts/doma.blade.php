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

<div class="col-lg-6 d-flex align-items-center" data-option="etaznost">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="etaznost" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['etaznost']))
                {{ $slider_item->options['etaznost']->value }}
            @else
                -
            @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="komnat">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="komnat" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['komnat']))
            {{ $slider_item->options['komnat']->value }}
        @else
            -
        @endif
        </div>
    </div>
</div>

<div class="col-lg-6 d-flex align-items-center" data-option="spalen">
    <div class="content-specials-pref-list-info__ico">
        <x-icon name="spalen" height="20" width="20" />
    </div>
    <div>
        <div class="content-specials-pref-list-info__text">
            @if (isset($slider_item->options['spalen']))
                {{ $slider_item->options['spalen']->value }}
            @else
            {{ $slider_item->bed_rooms ?? '-' }}
            @endif
        </div>
    </div>
</div>
