        <div class="row no-gutters px-3 px-lg-0 m-3 ">
            <div class="content-residential-form-sort col-6">
                <button id="switch-map" class="Button">Скрыть карту <i class="fas fa-map-marker-alt"></i></button>
            </div>
            @php
                $newurl = $fullurl;
                if (strpos($newurl, 'orderprice=asc') > 0) {
                    $newurl = str_replace('orderprice=asc', 'orderprice=desc', $newurl);
                } elseif (strpos($newurl, 'orderprice=desc') > 0) {
                    $newurl = str_replace('orderprice=desc', 'orderprice=asc', $newurl);
                } elseif (strpos($newurl, '?') > 0) {
                    $newurl = $newurl . '&orderprice=asc';
                } else {
                    $newurl = $newurl . '?orderprice=asc';
                }
            @endphp
            <div
                class="content-residential-form-sort col-6 text-right align-items-center justify-content-end flex-wrap d-flex">
                сортировать по: <a href="{{ $newurl }}" class="ml-1">цене
                    @if (isset($filter['orderprice']) && $filter['orderprice'] == 'desc')
                        <i class="fas fa-sort-amount-down"></i>
                    @elseif(isset($filter['orderprice']) && ($filter['orderprice'] == 'asc'))
                        <i class="fas fa-sort-amount-up-alt"></i>
                    @else
                        <i class="fas fa-sort-amount-down"></i>
                    @endif
                </a>
            </div>
        </div>
