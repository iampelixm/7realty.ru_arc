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
                required="" onchange="changeType()">
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
            <label for="">{{ __('admin.item_description') }}</label>
            <textarea class="form-control" name="description" class="summernote"
                required="required">{{ old('description') ?? '' }}</textarea>
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
    @include('admin.items.scripts_create')
@endsection
