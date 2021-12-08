    <!-- слайдер похожие объекты -->
    <div class="object-card-sliders">
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Похожие объекты</h2>
            <div class="content-specials-list-slider slider-custom__four owl-carousel px-5">

                @foreach ($similarItems as $key => $slider_item)
                    <!-- 5 Block - Размножаем этот блок -->
                    @if (view()->exists('components.object_slider.' . $slider_item->type->slug))
                        @include(('components.object_slider.'.$slider_item->type->slug))
                    @else
                        @include('components.object_slider.default')
                    @endif
                @endforeach

            </div>
        </div>
    </div>
