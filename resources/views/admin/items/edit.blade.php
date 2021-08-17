@extends('admin.layouts.main')
@section('title', 'Редактировать обьекта')
@section('content')
<div class="ibox-title">
    <h2>{{ __('admin.item_create') }}</h2>
    <a href="{{route('site.item.get', $item)}}" class="btn btn-success" target="_blank">Смотреть</a>
</div>
<div class="ibox-content">
    <form action="{{ route('admin.items.update', $item->id) }}" enctype="multipart/form-data" method="POST"
        role="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('admin.item_name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __('admin.item_name') }}"
                value="{{ old('name') ?? ($item->name ?? '') }}" required="">
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
        <div class="form-group">
            <label for="">SLUG</label>
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="Slug" value="{{ $item->slug ?? '' }}"
                        disabled="">
                </div>
                <div class="col-lg-6">
                    Изменить url
                    <input type="checkbox" class="form-control" name="slug_change">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="type_order">{{ __('admin.item_type_order') }}</label>
            <select class="js-example-basic-multiple-type form-control" name="type_order" id="type_order"
                required="true">
                <option value="sale" @if ($item->type_order == 'sale') selected @endif>{{ __('admin.item_type_order_sale') }}</option>
                <option value="orenda" @if ($item->type_order == 'orenda') selected @endif>{{ __('admin.item_type_order_orenda') }}</option>

            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-type-select') }}</label>
            <select class="js-example-basic-multiple-type form-control" name="type_id" id="type_id"
                onchange="changeType()" required="true">
                <option></option>
                @foreach ($types as $cat)
                    <option value="{{ $cat->id }}" @if ($cat->id == $item->type_id) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-category-select') }}</label>
            <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple" required="" >
                <option></option>
                @foreach ($categorys as $cat)
                    <option value="{{ $cat->id }}" @if (in_array($cat->id, $itemcategorys)) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group d-none">
            <div class="row">
                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_square') }}</label>
                    <input type="number" step="0.01" class="form-control" name="square"
                        placeholder="{{ __('admin.item_square') }}"
                        value="{{ old('square') ?? ($item->square ?? '1') }}" required="">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_all_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="all_rooms"
                        placeholder="{{ __('admin.item_all_rooms') }}"
                        value="{{ old('all_rooms') ?? ($item->all_rooms ?? '1') }}" required="true">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_bed_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="bed_rooms"
                        placeholder="{{ __('admin.item_bed_rooms') }}"
                        value="{{ old('bed_rooms') ?? ($item->bed_rooms ?? '1') }}" required="true">
                </div>

                <div class="col-sm-3">
                    <label for="">{{ __('admin.item_bath_rooms') }}</label>
                    <input type="number" step="1" class="form-control" name="bath_rooms"
                        placeholder="{{ __('admin.item_bath_rooms') }}"
                        value="{{ old('bath_rooms') ?? ($item->bath_rooms ?? '1') }}" required="true">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_description') }}</label>
            <textarea class="form-control summernote" name="description" required="true">
                    {{ old('description') ?? ($item->description ?? '') }}
                </textarea>

        </div>

        <div class="ibox ">
            <div class="ibox-title">
                <h2><i class="fa fa-cubes" aria-hidden="true"></i> Укажите характиристики</h2>
            </div>
            <div class="ibox-content">
                <table class="table" id="valuetable" style="font-size: 10px;">
                    <thead>
                        <tr>
                            <th>
                                Характеристика
                            </th>
                            <th>
                                Значение
                            </th>
                            <th>
                                Действие
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($item->options)}} --}}
                        @foreach ($item->all_options as $option)
                            <tr id="row_{{$option->id}}">
                                <td>
                                    {{ $option->name }}
                                    <input type="hidden" name="option[{{$option->id}}][option]" value="{{ $option->id }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="option[{{$option->id}}][value]" value="{{ $option->value }}" >
                                </td>
                                <td>
                                    <a class="ml-3 btn btn-sm btn-danger" onclick="$('#row_{{$option->id}}').remove()">Удалить</a>
                                </td>
                            </tr>
                        @endforeach

                        @php $itemoptioncount = 0 @endphp
                        @php $itemoptionarray = [] @endphp
                        {{-- @if ($itemoptions != null)
                                @foreach ($itemoptions as $value)
                                    <tr id="valuerow{{ $itemoptioncount }}">
                                        <td>{{ $itemoptioncount }}</td>
                                        <td><select class="form-control" id="selecetvalue{{ $itemoptioncount }}" name="option[{{ $itemoptioncount }}][option]\"><option value="{{ $value->value }}">{{ $value->name }}</option></select></td>
                                        <td id="selecetvalue{{ $itemoptioncount }}block">
                                            @if (isset($value->option_type) and $value->option_type == 'select')
                                            <select class="form-control" id="selecetvalue{{ $itemoptioncount }}value" name="option[{{ $itemoptioncount }}][value]"><option value="{{ $value->value_id }}">{{ $value->value }}</option></select>
                                            @elseif(isset($value->option_type) and ($value->option_type == 'hand'))
                                                <input class="form-control" id="selecetvalue{{ $itemoptioncount }}value" name="option[{{ $itemoptioncount }}][value]" value="{{ $value->value_id }}">
                                            @else
                                                <select class="form-control" id="selecetvalue{{ $itemoptioncount }}value" name="option[{{ $itemoptioncount }}][value]"><option value="{{ $value->value_id }}">{{ $value->value }}</option></select>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-danger" onclick="deleterow('valuerow', {{ $itemoptioncount }})">Удалить</button>
                                        </td>
                                    </tr>
                                    @php $itemoptionarray[$itemoptioncount] = $value->value @endphp
                                    @php $itemoptioncount ++ @endphp

                                @endforeach
                            @endif --}}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-image-select') }}</label>
            <div style="display: block;">
                @if ($item->images != null)
                    @foreach ($item->images as $image)
                        <img src="{{ url('storage/items/' . $item->id . '/' . $image->file) }}"
                            style="max-height: 150px; padding: 20px;">
                    @endforeach
                @endif
            </div>
            <input type="file" class="form-control" name="photos[]" multiple />

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-areas-select') }}</label>
            <select class="js-example-basic-multiple form-control" name="area_id" required="">
                <option></option>
                @foreach ($areas as $rez)

                    <option value="{{ $rez->id }}" @if ($rez->id == $item->area_id) selected @endif>{{ $rez->name }}</option>
                @endforeach
            </select>

        </div>

        <div style="display: none; background-color: #eefbea; padding: 20px; border: solid 1px green; margin: 10px;">
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
                        <input type="text" class="form-control" id="latitude" name="latitude"
                            placeholder="{{ __('admin.item_latitude') }}"
                            value="{{ old('latitude') ?? ($item->latitude ?? '1') }}" required="">
                    </div>

                    <div class="col-sm-3">
                        <label for="">{{ __('admin.item_longitude') }}</label>
                        <input type="text" class="form-control" id="longitude" name="longitude"
                            placeholder="{{ __('admin.item_longitude') }}"
                            value="{{ old('longitude') ?? ($item->longitude ?? '1') }}" required="">
                    </div>

                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_address') }}</label>

            <input class="form-control" placeholder="Введите адрес" type="text" required="true" name="address"
                value="{{ old('address') ?? ($item->address ?? '') }}" />

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item_price') }}</label>
            <input type="number" step="0.01" class="form-control" name="price"
                placeholder="{{ __('admin.item_price') }}" value="{{ old('price') ?? ($item->price ?? '') }}"
                required="">
        </div>

        <div class="form-group">
            <label for="">{{ __('admin.item-residence-select') }}</label>
            <select class="js-example-basic-multiple form-control" name="residence_id">
                <option></option>
                <option value="0">Нет</option>
                @foreach ($residence as $rez)
                    <option value="{{ $rez->id }}" @if ($rez->id == $item->residence_id) selected @endif>{{ $rez->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="">{{ __('admin.video_url') }}</label>
            <input type="text" class="form-control" name="video_url" placeholder="{{ __('admin.video_url') }}"
                value="{{ old('video_url') ?? ($item->video_url ?? '') }}">
        </div>

        @can('manageItemActivity')
            <div class="form-group">
                <label for="active">{{ __('admin.item_active') }}</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="form-control" name="active" @if ($item->active) checked @endif value="1">
            </div>
        @else
            <input type="hidden" name="active" value="{{ $item->active }}">
        @endcan

        <div class="form-group">
            <label for="active">{{ __('admin.special-offer-shot') }}</label>
            <select class="js-example-basic-multiple-type form-control" name="offer_index">
                @for ($i = 0; $i <= 100; $i++)
                    <option value="{{ $i }}" @if ($item->offer_index == $i) selected @endif>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="">{{ __('admin.item_remark') }}</label>
            <textarea class="form-control summernote"
                name="remark">{{ old('remark') ?? ($item->remark ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    </form>
</div>

@endsection

@section('script')
    @include('admin.items.scripts_edit')
@endsection
