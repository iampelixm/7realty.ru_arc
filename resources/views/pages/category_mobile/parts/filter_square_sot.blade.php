<div class="d-flex align-items-center">

    <div style="white-space: nowrap;">
        Площадь от
    </div>
    <input style="width: 40px" type="text" name="area-uchastka-min" id="areamin" placeholder="6"
        class="form-control py-2 pr-0 text-gold" value="{{$filter['area-uchastka-min'] ?? ''}}">

    <div class="text-gold">
        сот.
    </div>
    <div style="margin-left: 7px">
        до
    </div>
    <input style="width: 40px" type="text" name="area-uchastka-max" id="areamax" placeholder="77"
        class="form-control py-2 pr-0 text-gold" value="{{$filter['area-uchastka-max'] ?? ''}}">

    <div class="text-gold">
        сот.
    </div>
</div>
