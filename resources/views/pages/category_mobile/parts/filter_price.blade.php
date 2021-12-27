<div class="items-filter__price">
    <div class="items-filter__label">
        Цена от
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="pricefrom" placeholder="5" class="items-filter__input"
            value="{{ $filter['pricefrom'] ?? '1' }}">
    </div>
    <div class="items-filter__label text-gold">
        млн
    </div>
    <div class="items-filter__label">
        до
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="priceto" placeholder="30" class="items-filter__input"
            value="{{ $filter['priceto'] ?? '30' }}">
    </div>
    <div class="items-filter__label text-gold">
        млн
    </div>
</div>
