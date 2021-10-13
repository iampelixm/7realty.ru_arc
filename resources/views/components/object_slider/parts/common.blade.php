@foreach ($slider_item->options as $itemOptionName => $itemOption)
<div class="col-6 d-flex align-items-center item__option" data-option="{{ $itemOptionName }}">
    <div class="content-specials-pref-list-info__ico">
        <x-icon :name="$itemOptionName" :height="($icon_height ?? 20)" :width="($icon_width ?? 20)" />
    </div>

    <div>
        <div class="content-specials-pref-list-info__text">
            {{ $itemOption->value }}
        </div>
    </div>
</div>
@endforeach
