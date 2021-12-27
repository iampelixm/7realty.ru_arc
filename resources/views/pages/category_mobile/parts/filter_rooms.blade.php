<input type="hidden" name="rooms" id="filter_rooms_value">
<div class="dropdown">
    <div class="dropdown-toggle" id="filter_rooms_text" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        @if (!empty($filter['rooms']))
            {{ $filter['rooms'] }}
            {{ trans_choice('site.all_rooms', $filter['rooms']) }}
        @else
            Кол-во комнат
        @endif
    </div>
    <div class="dropdown-menu" aria-labelledby="filter_rooms_text">
        <a class="dropdown-item" onclick="selectDropdownItem(this)" data-param="rooms"
            data-value="">
            Любое
        </a>
        @for ($i = 1; $i < 6; $i++)
            <a class="dropdown-item" onclick="selectDropdownItem(this)" data-param="rooms"
                data-value="{{ $i }}">
                {{ $i }} {{ trans_choice('site.all_rooms', $i) }}
            </a>
        @endfor
    </div>
</div>
