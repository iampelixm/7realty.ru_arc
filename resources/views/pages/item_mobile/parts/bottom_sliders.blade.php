    <!-- слайдер похожие объекты -->
    <div class="object-card-sliders">
        <div class="content-specials-list-outer">
            <div class="content-specials-list">
                <div class="content-specials-list-div">
                    <h3 class="content-specials-list-div__h3">Похожие объекты</h3>
                </div>
            </div>
        </div>
        <div class="content-specials-list-slider slider-custom__four owl-carousel">

            @foreach ($similarItems as $key => $slider_item)
                <!-- 5 Block - Размножаем этот блок -->
                @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                    @include(('components.object_slider.'.$slider_item->type->slug))
                @else
                    @include('components.object_slider.default')
                @endif
            @endforeach

        </div>
        {{-- </div> --}}
    </div>
    <!-- слайдер  новинки -->
    <div class="object-card-sliders mb-5">
        {{-- <div class="row no-gutters"> --}}
        <div class="content-specials-list-outer">
            <div class="content-specials-list">
                <div class="content-specials-list-div">
                    <h3 class="content-specials-list-div__h3">Новинки</h3>
                </div>
            </div>
        </div>
        <div class="content-specials-list-slider slider-custom__four owl-carousel">

            @foreach ($newItems as $key => $slider_item)
                <!-- 5 Block - Размножаем этот блок -->
                @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                    @include(('components.object_slider.'.$slider_item->type->slug))
                @else
                    @include('components.object_slider.default')
                @endif
                {{-- @include('components.object_slider.default') --}}

            @endforeach

        </div>
        {{-- </div> --}}
    </div>
