<div class="items-filter__square">
    <div class="items-filter__label">
        Площадь от
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="squarefrom" id="squarefrom" placeholder="100" class="items-filter__input"
            value="{{ $filter['squarefrom'] ?? '30' }}">
    </div>
    <div class="items-filter__label text-gold">
        м<sup>2</sup>
    </div>
    <div class="items-filter__label">
        до
    </div>
    <div class="items-filter__input-wrapper">
        <input type="text" name="squareto" id="squareto" placeholder="120" class="items-filter__input"
            value="{{ $filter['squareto'] ?? '70' }}">
    </div>
    <div class="items-filter__label text-gold">
        м<sup>2</sup>
    </div>
</div>
