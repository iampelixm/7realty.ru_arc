<form method="GET" enctype="application/x-www-form-urlencoded" class="w-100 rounded-form rounded-pill border-gold">
    <div class="row rounded-pill align-items-center overflow-hiddena m-0">
        <div class="col">
            <div class="show-drop-down py-2 w-100 text-center">
                <p class="p-0 m-0 text-nowrap">
                    <span id="filter_category_text">
                        {{ $category->name }}
                    </span>

                    <i class="fas fa-chevron-down fa-chevron-down_position"></i>
                </p>
                <div class="drop-down-menu drop-down-menu___col_1">
                    <div>
                        @include('pages.category.parts.filter_categories')
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

        <div class="col" style="min-width: 350px;">
            <div class="d-flex align-items-center">

                <div style="width: 20px">
                    <x-icon name="item-price" width="20" height="20" />
                </div>
                <div style="white-space: nowrap;">
                    Цена от
                </div>
                <input type="text" name="pricefrom" id="rooms" placeholder="5 000 000"
                    class="form-control py-2 text-gold" value="{{ $filter['pricefrom'] ?? '' }}">
                <div>
                    до
                </div>
                <input type="text" name="priceto" id="rooms" placeholder="30 000 000"
                    class="form-control py-2 text-gold" value="{{ $filter['priceto'] ?? '' }}">
            </div>

        </div>

        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

        <div class="col">
            <input type="hidden" name="area" id="filter_area_value">
            <div class="show-drop-down py-2 w-100 text-center">
                <p class="p-0 m-0">
                    <span id="filter_area_text">
                        @if (isset($filter['area']))
                            @foreach ($current_areas as $carea)
                                @if ($carea->id == $filter['area'])
                                    {{ $carea->name }}
                                @endif
                            @endforeach
                        @else
                            Любой район
                        @endif

                    </span>

                    <i class="fas fa-chevron-down fa-chevron-down_position"></i>
                </p>
                <div class="drop-down-menu drop-down-menu___col_1">
                    <div>
                        <p class="drop-down-menu__p">
                            <a class="drop-down-menu__a" onclick="selectDropdownItem(this)" data-param="area"
                                data-value="">
                                Любой район
                            </a>
                        </p>
                        @foreach ($current_areas as $carea)
                            <p class="drop-down-menu__p">
                                <a class="drop-down-menu__a" onclick="selectDropdownItem(this)" data-param="area"
                                    data-value="{{ $carea->id }}">
                                    {{ $carea->name }}
                                </a>
                            </p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

        <div class="col">
            <div class="show-drop-down py-2 w-100 text-center">
                <input type="hidden" name="rooms" id="filter_rooms_value">
                <p class="p-0 m-0">
                    <span id="filter_rooms_text">
                        @if (!empty($filter['rooms']))
                            {{ $filter['rooms'] }}
                            {{ trans_choice('site.all_rooms', $filter['rooms']) }}
                        @else
                            Кол-во комнат
                        @endif

                    </span>

                    <i class="fas fa-chevron-down fa-chevron-down_position"></i>
                </p>

                <div class="drop-down-menu drop-down-menu___col_1">
                    <div>
                        <p class="drop-down-menu__p">
                            <a class="drop-down-menu__a" onclick="selectDropdownItem(this)" data-param="rooms"
                                data-value="">
                                Любое
                            </a>
                        </p>
                        @for ($i = 1; $i < 6; $i++)
                            <p class="drop-down-menu__p">
                                <a class="drop-down-menu__a" onclick="selectDropdownItem(this)" data-param="rooms"
                                    data-value="{{ $i }}">
                                    {{ $i }} {{ trans_choice('site.all_rooms', $i) }} asd
                                </a>
                            </p>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gold" style="width: 2px; height: 18px;">&nbsp;</div>

        <div class="col" style="min-width: 250px;">
            <div class="d-flex align-items-center">

                <div style="white-space: nowrap;">
                    Площадь от
                </div>
                <input style="width: 40px" type="text" name="minsquare" id="minsquare" placeholder="100"
                    class="form-control py-2 pr-0 text-gold" value="{{ $filter['minsquare'] ?? '' }}">

                <div class="text-gold">
                    м<sup>2</sup>
                </div>
                <div style="margin-left: 7px">
                    до
                </div>
                <input style="width: 40px" type="text" name="maxsquare" id="maxsquare" placeholder="120"
                    class="form-control py-2 pr-0 text-gold" value="{{ $filter['maxsquare'] ?? '' }}">

                <div class="text-gold">
                    м<sup>2</sup>
                </div>
            </div>

        </div>

        <div class="col bg-gold border-gold p-0 rounded-pill-right overflow-hidden">
            <input type="submit" class="form-control px-0 py-2 rounded-pill-right" value="Найти">
        </div>
    </div>
</form>

<script>
    function selectDropdownItem(el) {
        var param = $(el).data('param');
        var val = $(el).data('value');
        $('#filter_' + param + '_text').html($(el).html());
        $('#filter_' + param + '_value').val(val);
    }
</script>
