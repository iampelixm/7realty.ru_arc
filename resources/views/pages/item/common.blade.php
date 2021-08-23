@extends('layouts.site')

@section('content')
    <style>
        .hoverline a {
            color: $FFF;
        }

    </style>

    <!-- main content -->
    <!-- Блок Карточки объекта -->
    @can('view', 'App\Models\Item')
        <div class="p-2 text-right border-bottom">
            <a class="btn btn-success" href="{{ route('admin.items.edit', $item) }}">EDIT</a>
        </div>
    @endcan
    <div class="object-card-big-slider" style="margin-top: 40px;">
        <div class="d-flex no-gutters">
        @section('image_slider')
            @include('pages.item.parts.imageSlider')
        @show
        <!-- SLIDER INFO -->
        <div class="item_card" data-card="{{ $item->type->slug }}">
            <div class="content-object-card-information">
                @section('item_card')
                    @if (view()->exists('pages.item.parts.slider_info_' . $item->type->slug))
                        @include('pages.item.parts.slider_info_'.$item->type->slug)
                    @else
                        @include('pages.item.parts.slider_info_default')
                    @endif
                @show
            </div>
        </div>
    </div>
</div>

<div class="container no-gutters mx-auto px-0" style="max-width: 1360px; margin-top: 40px">
    <div class="row no-gutters align-content-stretch">
        <div class="col-lg-8 " style="min-height: 237px;">
            @include('pages.item.parts.broker_card')
        </div>

        <div class="col-lg-4" style="padding-top: 32px; padding-bottom: 32px; padding-left: 40px;">
            <div class="row no-gutters px-2 pt-2 " style="outline: 1px solid #C1A771; height: 100%;">
                @include('pages.item.parts.contact_form')
            </div>

        </div>
    </div>
</div>
<!-- Описание -->
<div class="container-fluid no-gutters p-0 mx-auto" style="max-width: 1360px; margin-top: 50px">
    <div style="border: 1px solid #C1A771; ">
        <h2 style="color: #C1A771; transform: translateY(-50%); background: #FFF;" class="ml-4 px-4 d-inline-block">
            {{ $item->name }}
        </h2>
        <div class="row no-gutters px-4 pb-4">
            <p>
                {!! $item->description !!}
            </p>
        </div>
    </div>
</div>



<div class="item-map-links d-none"
    style="margin-top: 70px; padding-top: 70px; padding-bottom: 70px; background-color: #C1A771">
    <div class="d-flex" style="margin: 0 auto; max-width: 1360px;">

        <a href="#" class="map-link col text-center hoverline">
            <div>
                <x-icon name="markered-map" />
            </div>
            <div>
                <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">КАРТА</h4>
                Открыть на карте
            </div>
            <div class="goldline mx-auto mt-3">&nbsp;</div>
        </a>

        <a href="#" class="map-link col text-center hoverline">
            <div>
                <x-icon name="street-view" />
            </div>
            <div>
                <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">УЛИЦА</h4>
                Просмотре улицы в 3D
            </div>
            <div class="goldline mx-auto mt-3">&nbsp;</div>
        </a>

        <a href="#" class="map-link col text-center hoverline">
            <div>
                <x-icon name="school" />
            </div>
            <div>
                <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">ШКОЛЫ</h4>
                Куда будет ходить ребенок
            </div>
            <div class="goldline mx-auto mt-3">&nbsp;</div>
        </a>

        <a href="#" class="map-link col text-center hoverline">
            <div>
                <x-icon name="tree" />
            </div>
            <div>
                <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">ПАРКИ И БОЛЬНИЦЫ</h4>
                Для вашего здоровья
            </div>
            <div class="goldline mx-auto mt-3">&nbsp;</div>
        </a>

        <a href="#" class="map-link col text-center hoverline">
            <div>
                <x-icon name="bar" />
            </div>
            <div>
                <h4 class="mt-3 mb-0 pb-0" style="font-size: 18px; font-weight: 500">РЕСТОРАНЫ И БАРЫ</h4>
                Развлечения поблизости
            </div>
            <div class="goldline mx-auto mt-3">&nbsp;</div>
        </a>
    </div>
</div>

@include('pages.item.parts.bottom_sliders')

@endsection
