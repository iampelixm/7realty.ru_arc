<div class="form-group">
    <h4>Дополнительные параметры</h4>

    <div class="form-group">
        <div class="form-group">
            <label for="">Анонс</label>

            <textarea class="form-control"
                name="params[announcement]">{!! $page->params->announcement ?? '' !!}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Превью</label>
            <select class="form-control" name="params[preview_image]" id="capegory">
                @foreach ($page->getMedia('images') as $imageItem_i => $imageItem)
                    <option value="{{ $imageItem_i }}"
                        {{ ($page->params->preview_image ?? 0) == $imageItem_i ? 'selected' : '' }}>
                        {{ $imageItem->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Дата проведения</label>
            <input data-showButtonPanel="true" data-dateFormat="DD, d MM, yy" type="text" class="form-control datepicker" name="params[date]" id="date" value="{!! $page->params->date ?? '' !!}">
        </div>
    </div>
</div>
