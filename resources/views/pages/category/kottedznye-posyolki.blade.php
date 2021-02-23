@extends('layouts.site')

@section('content')
    <div class="content-residential-form d-md-block mt-4">
        <div class="row no-gutters px-3 px-xl-0">
            <div class="col-sm-12">
                <h2 class="content-residential-form__h2 ">{{ $page_head ?? 'Квартиры' }}</h2>
            </div>
            <!-- Блок Формы для подбора объекта -->
            @include('components.object_filter_common')
            <!-- Блок Формы для подбора объекта КОНЕЦ -->
        </div>
        @include('components.object_sort')
    </div>
    <!-- Блок просмотра объекта -->
    <div class="content-residential mb-4 d-flex flex-wrap" id="cardContainer">
        <div id="cards" class="active">
            @php $index = 0 @endphp
            @foreach ($list as $item)
                @include('components.object_card.kottedznyi-poselok')
            @endforeach
        </div>
        <div id="map"></div>
        <div class="content-residential-pag w-100">
            {{ $list->links() }}
        </div>
    </div>
    </div>
    <!-- Блок просмотра объекта КОНЕЦ-->
@endsection
