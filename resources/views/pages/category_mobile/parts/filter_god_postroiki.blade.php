<input type="hidden" name="god_postroiki" id="filter_god_postroiki_value">
<div class="dropdown">
    <div class="dropdown-toggle" id="filter_god_postroiki_text" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        @if (!empty($filter['god_postroiki']))
            {{ $filter['god_postroiki'] }} г.
        @else
            Год постройки
        @endif
    </div>
    <div class="dropdown-menu" aria-labelledby="filter_god_postroiki_text">
        @for ($i = 2020; $i < 2025; $i++)
            <a class="dropdown-item" onclick="selectDropdownItem(this)" data-param="god_postroiki"
                data-value="{{ $i }}">
                {{ $i }} г.
            </a>
        @endfor
    </div>
</div>
