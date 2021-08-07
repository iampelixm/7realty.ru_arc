@foreach ($slider_item->options as $itemOptionName => $itemOption)
<div class="col-lg-6 d-flex align-items-center" data-option="{{ $itemOptionName }}">
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
