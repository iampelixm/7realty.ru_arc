@extends('admin.layouts.main')
@section('title', 'Редактировать ЖК')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.residence_edit') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.residences.update', $residence->id) }}" enctype="multipart/form-data" method="POST"
            role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.residence_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.residence_name') }}"
                    required="" value="{{ old('name') ?? ($residence->name ?? '') }}">
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
            @endcan

            @can('manageItemActivity')
                <div class="form-group">
                    <label for="active">{{ __('admin.active') }}</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" class="form-control" name="active" @if ($residence->active) checked @endif value="1">
                </div>
            @else
                <input type="hidden" name="active" value="{{ $residence->active }}">
            @endcan

            <div class="form-group">
                <label for="show_menu">{{ __('admin.show_menu') }}</label>
                <input type="hidden" name="show_menu" value="0">
                <input type="checkbox" class="form-control" name="show_menu" @if ($residence->show_menu) checked @endif value="1">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.residence_all_flats') }}</label>
                <input type="number" step="1" class="form-control" name="all_flats"
                    placeholder="{{ __('admin.residence_all_rooms') }}"
                    value="{{ old('all_flats') ?? ($residence->all_flats ?? 0) }}" required="">
            </div>

            <div class="form-group">
                <label>{{ __('admin.item_build') }}</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" value="@if ($residence->build_at != '') {{ date('Y-m-d', strtotime($residence->build_at)) }} @endif"
                    id="example-datetime-local-input" name="build_at" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item_adress') }}</label>
                <div id="locationField">
                    <input class="form-control" placeholder="Введите адрес" type="text" name="address"
                        value="{{ old('address') ?? ($residence->address ?? 0) }}" required="" />
                </div>
            </div>



            <div class="form-group">
                <label for="">{{ __('admin.item_description') }}</label>
                <textarea class="form-control" name="description" required="" id="summernote">
                                {{ old('description') ?? ($residence->description ?? 0) }}
                            </textarea>

            </div>

            <div class="form-group">
                <label for="">{{ __('admin.video_url') }}</label>
                <input type="text" class="form-control" name="video_url" placeholder="{{ __('admin.video_url') }}"
                    value="{{ old('video_url') ?? ($residence->video_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item-category-select') }}</label>
                <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple" required="">
                    @foreach ($categorys as $cat)
                        <option value="{{ $cat->id }}" @if (in_array($cat->id, $itemcategorys)) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item-areas-select') }}</label>
                <select class="js-example-basic-multiple form-control" name="area_id" required="">
                    <option selected disabled="">Выбрать</option>
                    @foreach ($areas as $rez)
                        <option value="{{ $rez->id }}" @if ($rez->id == $residence->area_id) selected @endif>{{ $rez->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="">{{ __('admin.item-image-select') }}</label>
                <div style="display: block;">
                    @if ($residence->images != null)
                        @foreach ($residence->images as $image)
                            <img src="{{ url('storage/residences/' . $residence->id . '/' . $image->file) }}"
                                style="max-height: 150px; padding: 20px;">
                        @endforeach
                    @endif
                </div>

                <div class="form-group">
                    <label for="">{{ __('admin.item-image-select') }}</label>
                    <input type="file" class="form-control" name="photos[]" multiple />

                </div>

                <div
                    style="display: block; background-color: #eefbea; padding: 20px; border: solid 1px green; margin: 10px;">
                    <div class="form-group">
                        <label for="" style="font-size: 20px;">{{ __('admin.item_adress_find') }}</label>
                        <div id="locationField">
                            <input class="form-control" id="autocomplete" placeholder="Введите адрес для поиска"
                                onFocus="geolocate()" type="text" name="findadress" value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">


                            <div class="col-sm-3">
                                <label for="">{{ __('admin.item_latitude') }}</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" required=""
                                    placeholder="{{ __('admin.item_latitude') }}"
                                    value="{{ old('latitude') ?? ($residence->latitude ?? '') }}">
                            </div>

                            <div class="col-sm-3">
                                <label for="">{{ __('admin.item_longitude') }}</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" required=""
                                    placeholder="{{ __('admin.item_longitude') }}"
                                    value="{{ old('longitude') ?? ($residence->longitude ?? '') }}">
                            </div>

                        </div>

                    </div>
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
            $('.js-example-basic-multiple').select2();
        });

    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsKey }}&callback=initAutocomplete&language=ru&libraries=places&v=weekly"
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
@endsection
