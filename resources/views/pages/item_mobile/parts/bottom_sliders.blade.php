<div class="items-block">
    <div class="items-block__header">
        <div class="items-block__title">
            Похожие объекты
        </div>
    </div>
    <div class="items-block__items-container two-col">
        @foreach ($similarItems as $key => $slider_item)
            @include('components.object_slider.default_mobile')
        @endforeach
    </div>
    <div class="items-block__more-link-wrapper d-none">
        <a class="items-block__more-link"
            href="">
            Все спецпредложения
        </a>
        <x-icon name="chevron-right" />
    </div>
</div>


<div class="items-block">
    <div class="items-block__header">
        <div class="items-block__title">
            Новинки
        </div>
    </div>
    <div class="items-block__items-container two-col">
        @foreach ($newItems as $key => $slider_item)
            @include('components.object_slider.default_mobile')
        @endforeach
    </div>
    <div class="items-block__more-link-wrapper d-none">
        <a class="items-block__more-link"
            href="">
            Все спецпредложения
        </a>
        <x-icon name="chevron-right" />
    </div>
</div>
