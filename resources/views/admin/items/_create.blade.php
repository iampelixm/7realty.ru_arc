@extends('admin.layouts.main')
@section('title', 'Создание обьекта')
@section('content')
<div class="ibox-title">
    <h2>{{ __('admin.item_create') }}</h2>
</div>
<div class="ibox-content">
    <form action="{{ route('admin.items.store') }}" enctype="multipart/form-data" method="POST" role="form">
        @csrf

        <div class="form-group">
            <label for="">{{ __('admin.item_name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __('admin.item_name') }}" required=""
                value="{{ old('name') ?? ($item->name ?? '') }}">
        </div>

        @can('manageItemUser')
            <div class="form-group">
                <label for="item_user">{{ __('admin.item_user') }}</label>
                <select class="js-example-basic-multiple-type form-control" name="user_id"
                    placeholder="{{ __('admin.item_user') }}">
                    @foreach (App\Models\User::whereIs('broker')->get() as $item_user)
                        <option value="{{ $item_user->id }}">{{ $item_user->name }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endcan

        <div class="form-group">
            <label for="type_order">{{ __('admin.item_type_order') }}</label>
            <select class="js-example-basic-multiple-type form-control" name="type_order" id="type_order" required="">
                <option value="sale" selected="">{{ __('admin.item_type_order_sale') }}</option>
                <option value="orenda">{{ __('admin.item_type_order_orenda') }}</option>

            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-type-select') }}</label>
            <select class="js-example-basic-multiple-type form-control required" name="type_id" id="type_id"
                onchange="changeType()" required="">
                <option></option>
                @foreach ($types as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $cat->id == request()->get('type_id') ? 'selected' : '' }}>
                        {{ $cat->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-category-select') }}</label>
            <select class="js-example-basic-multiple form-control required" name="categories[]" multiple="multiple"
                id="category-select" required="">
                @foreach ($categorys as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_square') }}</label>
                    <input type="number" step="0.01" class="form-control" name="square"
                        placeholder="{{ __('admin.item_square') }}" value="{{ old('square') ?? '0' }}"
                        required="">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_all_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="all_rooms"
                        placeholder="{{ __('admin.item_all_rooms') }}" value="{{ old('all_rooms') ?? '0' }}"
                        required="">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_bed_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="bed_rooms"
                        placeholder="{{ __('admin.item_bed_rooms') }}" value="{{ old('bed_rooms') ?? '0' }}"
                        required="">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_bath_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="bath_rooms"
                        placeholder="{{ __('admin.item_bath_rooms') }}" value="{{ old('bath_rooms') ?? '0' }}"
                        required="">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_description') }}</label>
            <textarea class="form-control" name="description" class="summernote"
                required="required">{{ old('description') ?? '' }}</textarea>
        </div>

        <div class="ibox ">
            <div class="ibox-title">
                <h2><i class="fa fa-cubes" aria-hidden="true"></i> Укажите характеристики объекта</h2>
            </div>
            <div class="ibox-content">
                <table class="table" id="valuetable" style="font-size: 10px;">
                    <thead>
                        <tr>
                            <th>
                                №
                            </th>
                            <th>
                                Характеристика
                            </th>
                            <th>
                                Значение
                            </th>
                            <th>
                                Управление
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn btn-primary btn-outline " type="button" onclick="addvalue()"><i
                                class="fa fa-plus"></i>&nbsp;Добавить значение</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-image-select') }}</label>
            <input type="file" class="form-control" name="photos[]" multiple required="" />

        </div>

        <div class="form-group">

            <label for="">{{ __('admin.item-areas-select') }}</label>
            <select class="js-example-basic-multiple form-control required-select" name="area_id" required="true">
                <option></option>
                @foreach ($areas as $rez)
                    <option value="{{ $rez->id }}" @if (isset($area_id) && $area_id == $rez->id) selected @endif>
                        {{ $rez->name }}</option>
                @endforeach
            </select>

        </div>

        <div style="display: block; background-color: #eefbea; padding: 20px; border: solid 1px green; margin: 10px;">
            <div class="form-group">
                <label for="" style="font-size: 20px;">{{ __('admin.item_adress_find') }}</label>
                <div id="locationField">
                    <input class="form-control" id="autocomplete" placeholder="Введите адрес для поиска"
                        onFocus="geolocate()" type="text" name="findadress" value="" />
                </div>
            </div>

            <div class="form-group" {!! Auth::user()->isA('broker') ? 'style="display: none;"' : '' !!}>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">{{ __('admin.item_latitude') }}</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required=""
                            placeholder="{{ __('admin.item_latitude') }}" value="{{ old('latitude') ?? '0' }}">
                    </div>

                    <div class="col-sm-3">
                        <label for="">{{ __('admin.item_longitude') }}</label>
                        <input type="text" class="form-control" id="longitude" required="" name="longitude"
                            placeholder="{{ __('admin.item_longitude') }}" value="{{ old('longitude') ?? '0' }}">
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="">{{ __('admin.item_adress') }}</label>
            <div id="locationField">
                <input class="form-control" type="text" name="address" value="{{ old('address') ?? '' }}"
                    required="" />
            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_price') }}</label>
            <input type="number" step="0.01" class="form-control" name="price"
                placeholder="{{ __('admin.item_price') }}" value="{{ old('price') ?? '0' }}" required="">
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-residence-select') }}</label>
            <select class="js-example-basic-multiple-residence form-control" name="residence_id">
                <option></option>
                <option value="0">Нет</option>
                @foreach ($residence as $rez)

                    <option value="{{ $rez->id }}" @if (isset($residence_id) && $residence_id == $rez->id) selected @endif>{{ $rez->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.video_url') }}</label>
            <input type="text" class="form-control" name="video_url" placeholder="{{ __('admin.video_url') }}"
                value="{{ old('video_url') ?? '' }}">
        </div>

        @can('manageItemActivity')
            <div class="form-group">
                <label for="active">{{ __('admin.item_active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" checked value="1">
            </div>
        @else
            <input type="hidden" name="active" value="0">
        @endcan

        <div class="form-group">
            <label for="offer_index">{{ __('admin.special-offer-shot') }}</label>
            <select class="js-example-basic-multiple-type form-control" name="offer_index">
                @for ($i = 0; $i <= 100; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_remark') }}</label>
            <textarea class="form-control" name="remark" class="summernote">{{ old('remark') ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    </form>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Выбрать"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple-residence').select2({
            placeholder: "Выбрать"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple-type').select2({
            placeholder: "Выбрать"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple-option').select2({
            placeholder: "Выбрать"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-option').select2({
            placeholder: "Выбрать"
        });
    });
</script>

<script type="text/javascript">
    var indexvalue = 0;
    var oldtype = 0;
    var optionSelected = {};

    $(document).ready(function() {
        console.log($('.js-data-example-ajax'));
        $('.js-data-example-ajax').select2({
            ajax: {
                url: '{{ route('api.getoption') }}',
                dataType: 'json',
            }
        });
    });

    $('#selectadress').select2({
        ajax: {
            url: '{{ route('api.getadress') }}',
            dataType: 'json',
        }
    });

    function changeType() {
        var typeElement = document.getElementById('type_id').value;
        $("#valuetable").html('');
        indexvalue = 0;
        oldtype = typeElement;
        optionSelected = {};

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('api.getcategory') }}",
            method: 'get',
            data: {
                type: typeElement,
            },
            dataType: 'json',
            cache: false,
            success: function(response) {

                $("#category-select").html('');
                if (response['list']) {
                    response['list'].forEach(function(item, i, arr) {
                        newOption = new Option(item['text'], item['id']);
                        $("#category-select").append(newOption);
                    });
                }

            },
            error: function(e) {
                console.log(response);
            }
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('api.getoption_for_type') }}",
            method: 'get',
            data: {
                type: typeElement,
            },
            dataType: 'json',
            cache: false,
            success: function(response) {
                indexvalue = 0;
                $("#valuetable").html('');

                response.forEach(function(item, i, arr) {
                    console.log(item['text']);
                    addvaluebyid(item['id'], item['text'])
                    createoption(item['id'], indexvalue);
                    initselect(indexvalue);
                    optionSelected[indexvalue] = item['id'];
                    indexvalue = indexvalue + 1;
                });

            },
            error: function(e) {
                console.log(response);
            }
        });

        console.log(typeElement);

    }

    function createoption(id, index) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('api.valuebyoption') }}",
            method: 'post',
            data: {
                option: id,

            },
            dataType: 'json',
            cache: false,
            success: function(response) {

                if (response['type'] == 'select') {

                    response['list'].forEach(function(item, i, arr) {
                        newOption = new Option(item['name'], item['index']);
                        $("#selecetvalue" + index + "value").append(newOption);
                    });
                }

                if (response['type'] == 'hand') {
                    $("#selecetvalue" + index + "block").html('');
                    var input = " <input type=\"text\" class=\"form-control\" name=\"option[" + index +
                        "][value]\">";
                    $("#selecetvalue" + index + "block").append(input);
                }
            },
            error: function(e) {
                console.log(response);
            }
        });
    }



    function addvaluebyid(id, name) {

        var inputprocent =
            `
<select class="form-control" id="selecetvalue${indexvalue}" name="option[${indexvalue}][option]"
data-id="${indexvalue}">
<option value="${id}">${name}</option>
</select>`;
        var inputval =
            `
<select class="form-control" id="selecetvalue${indexvalue}value" required="" name="option[${indexvalue}][value]">
<option disabled>Выбрать</option>
</select>`;
        var delbutton =
            `
<button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', ${indexvalue}")">
Удалить
</button>`;
        var row =
            `
<tr id="valuerow${indexvalue}">
<td>${indexvalue}</td>
<td>${inputprocent}</td>
<td id="selecetvalue${indexvalue}block">${inputval}</td>
<td>${delbutton}</td>
</tr>`;

        $("#valuetable").append(row);
    }

    function addvalue() {

        var inputprocent =
            `
<select class="form-control" id="selecetvalue${indexvalue}" name="option[${indexvalue}][option]"
data-id="${indexvalue}">
<option>Выбрать</option>
</select>`;
        var inputval =
            `
<select class="form-control" id="selecetvalue${indexvalue}value" name="option[${indexvalue}][value]">
<option>Выбрать</option>
</select>`;
        var delbutton =
            `
<button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', ${indexvalue}")">
Удалить
</button>`;
        var row =
            `
<tr id="valuerow${indexvalue}">
<td>${indexvalue}</td>
<td>${inputprocent}</td>
<td id="selecetvalue${indexvalue}block">${inputval}</td>
<td>${delbutton}</td>
</tr>`;

        $("#valuetable").append(row);

        initselect(indexvalue);
        indexvalue = indexvalue + 1;
    }

    function initselect(index) {
        $('#selecetvalue' + index).select2({
            ajax: {
                url: '{{ route('api.getoption') }}',
                dataType: 'json',
                data: function(params) {
                    var query = {
                        search: params.term,
                        optionSelected: optionSelected,
                        typeSelected: oldtype,
                    }
                    return query;
                }

            }
        });


        $('#selecetvalue' + index).on('select2:select', function(e) {
            var name = this.id;
            var idSelect = this.getAttribute('data-id');
            var data = e.params.data;
            optionSelected[index] = data['id'];
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('api.valuebyoption') }}",
                method: 'post',
                data: {
                    option: data['id'],

                },
                dataType: 'json',
                cache: false,
                success: function(response) {

                    if (response['type'] == 'select') {
                        $("#" + name + "value").html('');
                        response['list'].forEach(function(item, i, arr) {
                            newOption = new Option(item['name'], item['index']);
                            $("#" + name + "value").append(newOption);
                        });
                    }

                    if (response['type'] == 'hand') {
                        $("#" + name + "block").html('');
                        var input = " <input type=\"text\" class=\"form-control\" name=\"option[" +
                            idSelect + "][value]\">";
                        $("#" + name + "block").append(input);
                    }
                    //console.log(response['list']);
                    //console.log(indexvalue);

                },
                error: function(e) {
                    console.log(response);
                }
            });

        });

    }

    function deleterow(name, index) {
        var rowname = "#" + name + index;
        optionSelected[index] = null;
        $(rowname).remove();
    }

    window.onload = function() {
        changeType();
    };
</script>
<script
src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsKey }}&callback=initAutocomplete&libraries=places&language=ru&v=weekly"
defer>
</script>

<script type="text/javascript">
    let placeSearch;
    let autocomplete;
    const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name"
    };

    // const geocoder = new google.maps.Geocoder();


    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"), {
                types: ["geocode"]
            }
        );

        autocomplete.setFields(["address_component"]);

        autocomplete.addListener("place_changed", fillInAddress);


    }



    function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();

        adress = document.getElementById('autocomplete').value;
        const geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder);
        console.log(adress);

        // $.ajax({
        //       headers: { 'X-CSRF-TOKEN' : "{{ csrf_token() }}" },
        //       url: "{{ route('api.getadress') }}",
        //       method: 'get',
        //       data:{
        //           term: adress,
        //       },
        //       dataType: 'json',
        //       cache: false,
        //       success: function(response) {
        //          document.getElementById('latitude').value = response['lat'];
        //          document.getElementById('longitude').value = response['lng'];
        //          //console.log(response);

        //       },
        //       error: function (e) {
        //           console.log(response);
        //       }
        //   });
    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                const circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    function geocodeAddress(geocoder) {
        const address = document.getElementById("autocomplete").value;
        geocoder.geocode({
                address: address
            },
            (results, status) => {
                if (status === "OK") {
                    lat = results[0].geometry.location.lat();
                    lng = results[0].geometry.location.lng();
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                } else {
                    alert(
                        "Geocode was not successful for the following reason: " + status
                    );
                }
            }
        );
    }
</script>

@endsection
