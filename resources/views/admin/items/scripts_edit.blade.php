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
        $('.js-example-basic-multiple-type').select2({
            placeholder: "Выбрать"
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple-option').select2({
            placeholder: "Выбрать"
        });
    });
</script>

<script type="text/javascript">
    var indexvalue = {{ $itemoptioncount }};
    var optionSelected = {};
    var oldtype = document.getElementById('type_id').value;
    @foreach ($itemoptionarray as $key => $option)
        @php echo('optionSelected['.$key.']='.$option.';') @endphp
    @endforeach

    $(document).ready(function() {
        $('.js-data-example-ajax').select2({
            ajax: {
                url: '{{ route('api.getoption') }}',
                dataType: 'json',

            }
        });

        for (let i = 0; i <= indexvalue; i++) {
            initselect(i);
        }

    });

    function changeTypeOnLoad() {
        var typeElement = document.getElementById('type_id').value;
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
                response['list'].forEach(function(item, i, arr) {
                    newOption = new Option(item['text'], item['id']);
                    $("#category-select").append(newOption);
                });
                console.log(response['list']);

            },
            error: function(e) {
                console.log(response);
            }
        });
    }

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
                response['list'].forEach(function(item, i, arr) {
                    newOption = new Option(item['text'], item['id']);
                    $("#category-select").append(newOption);
                });

                console.log(response['list']);
                //console.log(indexvalue);

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
                console.log('getted options for type');
                indexvalue = 0;
                $("#valuetable").html('');

                response.forEach(function(item, i, arr) {
                    console.log(item['text']);
                    addvaluebyid(item['id'], item['text']);
                    createoption(item['id'], indexvalue);
                    initselect(indexvalue);
                    optionSelected[indexvalue] = item['id'];
                    indexvalue = indexvalue + 1;
                });

            },
            error: function(e) {
                console.log('get options for type falied');
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

        var inputprocent = `
                <select class="form-control" id="selecetvalue${indexvalue}" name="option[${indexvalue}][option]" data-id="${indexvalue}">
                <option value="${id}">${name}</option>
                </select>`;
        var inputval = `
                <select class="form-control" id="selecetvalue${indexvalue}value" required="" name="option[${indexvalue}][value]">
                <option disabled>Выбрать</option>
                </select>`;
        var delbutton =
            `
            <button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', ${indexvalue})">Удалить</button>`;
        var str = `
            <tr id="valuerow${indexvalue}">
            <td>${indexvalue}</td>
            <td>${inputprocent}</td>
            <td id="selecetvalue${indexvalue}block">${inputval}</td>
            <td>${delbutton}</td>
            </tr>`;

        $("#valuetable").append(str);
    }


    function addvalue() {
        console.log('add value', indexvalue);

        var inputprocent = `
            <select class="form-control" id="selecetvalue${indexvalue}" name="option[${indexvalue}][option]" data-id="${indexvalue}">
            <option>Выбрать</option>
            </select>`;
        var inputval = `
            <select class="form-control" id="selecetvalue${indexvalue}value" name="option[${indexvalue}][value]">
            <option>Выбрать</option>
            </select>`;
        var delbutton =
            `
            <button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', ${indexvalue})">Удалить</button>`;
        var str = `
            <tr id="valuerow${indexvalue}"><td>${indexvalue}</td>
            <td>${inputprocent}</td>
            <td id="selecetvalue${indexvalue}block">${inputval}</td>
            <td>${delbutton}</td>
            </tr>`;

        $("#valuetable").append(str);

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
        changeTypeOnLoad();
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
        console.log(adress);

        const geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder);

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
