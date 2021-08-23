@extends('layouts.site')

@section('content')
    <div class="content-residential d-md-block mt-4">
        <div class="row no-gutters px-3 px-xl-0">
            <div class="col-sm-12 d-none">
                <h2 class="content-residential-form__h2 ">{{ $page_head ?? 'Квартиры' }}</h2>
            </div>
            <!-- Блок Формы для подбора объекта -->

        @section('category_filter')
            <div class="d-none">{{$category->slug}}</div>
            @if (view()->exists('pages.category.parts.filter_' . $category->slug))
                @include('pages.category.parts.filter_'.$category->slug)
            @else
                @include('pages.category.parts.filter_default')
            @endif
        @show
        <!-- Блок Формы для подбора объекта КОНЕЦ -->
    </div>
    {{-- @include('components.object_sort') --}}
</div>
<!-- Блок просмотра объекта -->

<div class="content-residential mb-4 d-flex flex-wrap cardContainer_closeMap" id="cardContainer">
    <div id="cards" class="_active">
        @php $index = 0 @endphp
        @foreach ($list as $slider_item)
            @include('components.object_slider.default')
        @endforeach
    </div>
    <div id="mapa"></div>
    <div class="content-residential-pag w-100">
        {{ $list->links() }}
    </div>
</div>
</div>
<!-- Блок просмотра объекта КОНЕЦ-->
@endsection
