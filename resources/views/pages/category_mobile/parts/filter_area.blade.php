<input type="hidden" name="area" id="filter_area_value">
<div class="dropdown">
    <div class="dropdown-toggle" id="filter_area_text" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (isset($filter['area']))
            @foreach ($current_areas as $carea)
                @if ($carea->id == $filter['area'])
                    {{ $carea->name }}
                @endif
            @endforeach
        @else
            Любой район
        @endif
    </div>
    <div class="dropdown-menu" aria-labelledby="filter_rooms_text">
        <a class="dropdown-item" onclick="selectDropdownItem(this)" data-param="area" data-value="">
            Любой район
        </a>
        @foreach ($current_areas as $carea)
            <a class="dropdown-item" onclick="selectDropdownItem(this)" data-param="area"
                data-value="{{ $carea->id }}">
                {{ $carea->name }}
            </a>
        @endforeach
    </div>
</div>
