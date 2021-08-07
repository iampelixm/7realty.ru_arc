<div class="col-12 row row-cols-2 no-gutters d-none">
    <div class="col-12 col-lg-10 no-gutters">
        <form action="{{ $action }}" class="filter-wrapper-class">
            <div class="row row-cols-4 justify-content-between no-gutters flex-column flex-lg-row">
                <div class="content-residential-form-input col-auto row no-gutters mb-3 mb-lg-0">
                    <div class="col-11 mt-1">
                        <input class="pl-3 h-100" type="text" name="price" placeholder="Цена" autocomplete="off">
                    </div>
                    <div class="col-1 mt-1 text-right text-lg-left">
                        <span class="b-arrow"></span>
                    </div>
                </div>
                <div class="content-residential-form-select col-auto row no-gutters mb-3 mb-lg-0">
                    <select class="pl-3 content-residential-form-input2 select-custom select-custom--small" type="text"
                        name="area" placeholder="Район">
                        <option value="" selected>Все районы</option>
                        @foreach ($areasSelect as $area)
                            <option value="{{ $area->id }}" @if (isset($filter['area']) && $filter['area'] == $area->id) selected @endif>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ((isset($minRooms) && $minRooms != null) || (isset($maxRooms) && $maxRooms != null))
                    <div class="content-residential-form-input col-auto row no-gutters mb-3 mb-lg-0">
                        <div class="col-11 mt-1">
                            <input class="pl-3 h-100" type="text" name="rooms" placeholder="Комнаты" autocomplete="off">
                        </div>
                        <div class="col-1 mt-1 text-right text-lg-left">
                            <span class="b-arrow"></span>
                        </div>
                    </div>
                @endif
                <div class="content-residential-form-input col-auto row no-gutters mb-3 mb-lg-0">
                    <div class="col-11 mt-1">
                        <input class="pl-3 h-100" type="text" name="square" placeholder="Площадь" autocomplete="off">
                    </div>
                    <div class="col-1 mt-1 text-right text-lg-left">
                        <span class="b-arrow"></span>
                    </div>
                </div>
            </div>
            <div class="col row no-gutters mb-3 mb-lg-0 mx-auto m-lg-0 filter-input">
                <div
                    class="content-residential-form-down content-residential-form-down-default row no-gutters price-form">
                    <div class="col row no-gutters">
                        <div class="col-10">
                            <input class="" type="text" name="pricefrom" placeholder="от 10 000 000" value="@if (isset($filter['pricefrom'])) {{ $filter['pricefrom'] }} @endif">
                        </div>
                        <div class="col-2">
                            <i class="fas fa-ruble-sign"></i>
                        </div>
                    </div>
                    <div class="col row no-gutters">
                        <div class="col-10">
                            <input class="" type="text" name="priceto" placeholder="до 30 000 000" value="@if (isset($filter['priceto'])) {{ $filter['priceto'] }} @endif">
                        </div>
                        <div class="col-2">
                            <i class="fas fa-ruble-sign"></i>
                        </div>
                    </div>
                </div>
                <div
                    class="content-residential-form-down content-residential-form-down-default row d-none no-gutters location-form">
                </div>
                @if ((isset($minRooms) && $minRooms != null) || (isset($maxRooms) && $maxRooms != null))
                    <div
                        class="content-residential-form-down content-residential-form-down-default row no-gutters rooms-form">
                        <div class="col row no-gutters">
                            <div class="col-10">
                                <input class="" type="text" name="roomsfrom"
                                    placeholder="от {{ $minRooms ?? 1 }} комнаты" value="@if (isset($filter['roomsfrom'])) {{ $filter['roomsfrom'] }} @endif">
                            </div>
                            <div class="col-2">
                                @include('components.svg.filter_rooms')
                            </div>
                        </div>
                        <div class="col row no-gutters">
                            <div class="col-10">
                                <input class="" type="text" name="roomsto"
                                    placeholder="до {{ $maxRooms ?? 1 }} комнат" value="@if (isset($filter['roomsto'])) {{ $filter['roomsto'] }} @endif">
                            </div>
                            <div class="col-2">
                                @include('components.svg.filter_rooms')
                            </div>
                        </div>
                    </div>
                @endif
                <div
                    class="content-residential-form-down content-residential-form-down-default row no-gutters square-form">
                    <div class="col row no-gutters">
                        <div class="col-10">
                            <input class="" type="text" name="squarefrom" placeholder="от" value="@if (isset($filter['squarefrom'])) {{ $filter['squarefrom'] }} @endif">
                        </div>
                        <div class="col-2">
                            @include('components.svg.filter_square')
                        </div>
                    </div>
                    <div class="col row no-gutters">
                        <div class="col-10">
                            <input class="" type="text" name="squareto" placeholder="до" value="@if (isset($filter['squareto'])) {{ $filter['squareto'] }} @endif">
                        </div>
                        <div class="col-2">
                            @include('components.svg.filter_square')
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-12 col-lg-2">
        <div class="content-residential-form-button col-auto">
            <div><button type="submit">Найти</button></div>
        </div>
    </div>
    </form>
</div>
