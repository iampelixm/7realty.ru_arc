<div class="items-filter__square">
    <div class="items-filter__label">
        Площадь от
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="area-uchastka-min" id="area-uchastka-min" placeholder="3" class="items-filter__input"
            value="{{ $filter['area-uchastka-min'] ?? '3' }}">
    </div>
    <div class="items-filter__label text-gold">
        сот
    </div>
    <div class="items-filter__label">
        до
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="area-uchastka-max" id="area-uchastka-max" placeholder="20" class="items-filter__input"
            value="{{ $filter['squareto'] ?? '20' }}">
    </div>
    <div class="items-filter__label text-gold">
        сот
    </div>
</div>
