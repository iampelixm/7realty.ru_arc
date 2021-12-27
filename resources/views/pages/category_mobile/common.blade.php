@extends('layouts.site_mobile')
@section('meta_description')
    {{ $category->meta_description ?? '' }}
@endsection
@section('content')
    <div class="content-residential d-md-block mt-4">
        <div class="row no-gutters px-3 px-xl-0">
            <div class="col-sm-12 d-none">
                <h2 class="content-residential-form__h2 ">{{ $page_head ?? 'Квартиры' }}</h2>
            </div>

        @section('category_filter')
            <div class="items-filter">
                @include('pages.category_mobile.parts.filter_default')
            </div>
        @show
    </div>
</div>

<div class="items-block" style="margin-top: 40px">
    <div class="items-block__items-container two-col">
        @foreach ($list as $slider_item)
            @include('components.object_slider.default_mobile')
        @endforeach
    </div>
    <div class="items-block__pages-list">
        {{ $list->links() }}
    </div>
</div>
<div style="height:40px"></div>
@endsection
