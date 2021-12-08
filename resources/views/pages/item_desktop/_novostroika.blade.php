@extends('pages.item_desktop.common')

@section('item_card')
@include('pages.item_desktop.parts.slider_info_novostroyka')
@show



{{-- @php
$main_options = [
    'minimalnaya_ploshhad' => 1,
    'maksimalnaya_ploshhad' => 1,
    'minimalnaya_cena_za_kvm' => 1,
];
@endphp
@section('content')


    <!-- main content -->
    <!-- Блок Карточки объекта -->
    <div class="object-card-title">
        <div class="object-card-title_position_absolute d-none d-md-block">Карточка</div>
    </div>


    <div class="object-card-big-slider">
        <div class="row no-gutters justify-content-between px-3">

            @include('pages.item_desktop.parts.imageSlider')

            <div class="col-12 col-md-4 px-2 px-md-none">
                <div class="content-object-card-information">
                    @include('pages.item_desktop.parts.slider_info_novostroika')
                    @include('pages.item_desktop.parts.slider_request_form')

                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Инфраструктура и окружение</h2>
            <div id="modal-map"></div>

        </div>
    </div>
    <!-- Описание -->
    <div class="object-card-info">
        <div class="row no-gutters">
            <h2 class="content-object-card-info-title col-11 col-xl-12">Описание</h2>
            <p class="content-object-card-info__p col-11 col-xl-12">
                {!! $item->description !!}
            </p>
        </div>
        @php
            $itemoptions = [];
            foreach ($item->options as $ik => $iv) {
                if (!isset($main_options[$ik])) {
                    $itemoptions[] = $iv;
                }
            }
        @endphp
        <div class="row no-gutters">
            <h2 class="content-object-card-around-title col-11 col-xl-12">Характеристики</h2>
            <div class="content-object-card-parametr-list col-11 col-xl-12">
                <ul class="content-object-card-parametr-list__ul row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @foreach ($itemoptions ?? [] as $key => $value)
                        @if ($key < 10)
                            <li class="content-object-card-parametr-li col">{{ $value->option_title }} -
                                {{ $value->value_title }}</li>
                        @endif
                    @endforeach

                </ul>
            </div>
            @if (count($itemoptions ?? []) > 10)
                <p class="content-object-card-parametr-list_more col-11 col-xl-12">Далее</p>
                <div class="content-object-card-parametr-list col-11 col-xl-12 d-none">
                    <ul class="content-object-card-parametr-list__ul row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        @foreach ($itemoptions ?? [] as $key => $value)
                            <li class="content-object-card-parametr-li col">{{ $value->option_title }} -
                                {{ $value->value_title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content-object-card-parametr-list__button col-12 text-center col-md-11 text-md-left">
                <button
                    class="content-object-card-information-button-details content-object-card-parametr-list__button-info btn_info">Узнать
                    подробнее</button>
            </div>

            <div class="content-object-card-parametr-list__button col-12 text-center col-md-11 text-md-left">
                @if ($item->video_url)
                    <a href="{{ $item->video_url }}" target="_blank">
                        <button
                            class="content-object-card-parametr-list__button-info content-object-card-parametr-list__button-info--video btn_show">Видеотур</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
    @include('pages.item_desktop.parts.comments')
    @include('pages.item_desktop.parts.request_form')
    @include('pages.item_desktop.parts.bottom_sliders')

@endsection --}}
