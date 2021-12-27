@php
$filter_fields_set = [];

$filter_fields_set['default'] = ['categories', 'price', 'area', 'rooms', 'square'];

$filter_fields_set['doma'] = ['categories', 'price', 'area', 'square'];
$filter_fields_set['kottedznye-posyolki'] = ['categories', 'price', 'area', 'square'];
$filter_fields_set['novostroiki'] = ['categories', 'price', 'area', 'god_postroiki', 'square'];
$filter_fields_set['ucastki'] = ['categories', 'price', 'area', 'square_sot'];
$filter_fields_set['zemelnye-ucastki'] = ['categories', 'price', 'area', 'square_sot'];

$filter_fields = $filter_fields_set['default'];
if (isset($filter_fields_set[$category->slug])) {
    $filter_fields = $filter_fields_set[$category->slug];
}
@endphp
<form method="GET" enctype="application/x-www-form-urlencoded" class="items-filter__form">
    <div class="items-filter__title">
        Воспользуйтесь <span class="text-white">фильтром</span><br>
        и выберите подходяищй объект
    </div>
    @foreach ($filter_fields as $field)
        <div class="items-filter__field">
            @include('pages.category_mobile.parts.filter_'.$field)
        </div>
    @endforeach
</form>
@push('javascript')
    <script>
        function selectDropdownItem(el) {
            var param = $(el).data('param');
            var val = $(el).data('value');
            $('#filter_' + param + '_text').html($(el).html());
            $('#filter_' + param + '_value').val(val);
            console.log('param', param, 'val', val, el);
        }
    </script>
@endpush
