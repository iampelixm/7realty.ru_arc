@extends('admin.layouts.main')
@section('title', 'Список ЖК')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.items_list') }}</h2>
        <div class="ibox-tools">
            <a href="{{ route('admin.residences.create') }}">
                Добавить <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            @if ($list->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ __('admin.item_image') }}</th>
                            @can('manageItemUser')
                                <th>{{ __('admin.item_user') }}</th>
                            @endcan
                            <th>{{ __('admin.item_name') }}</th>
                            <th>{{ __('admin.item_category') }}</th>
                            <th>{{ __('admin.item_adress') }}</th>
                            <th>{{ __('admin.item_build') }}</th>
                            <th>{{ __('admin.residence_all_flats') }}</th>
                            <th>{{ __('admin.residence_flat_count') }}</th>
                            <th>{{ __('admin.areas_name') }}</th>
                            <th>{{ __('admin.item_images_count') }}</th>
                            <th>{{ __('admin.comments') }}</th>
                            @can('manageItemActivity')
                                <th>{{ __('admin.active') }}</th>
                            @endcan

                            <th class="buttons__"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->FirstImage != null)
                                        <img src="{{ url('storage/residences/' . $item->id . '/' . $item->FirstImage->file) }}"
                                            style="max-height: 100px;">
                                    @else
                                        (no-image)
                                    @endif
                                </td>
                                @can('manageItemUser')
                                    <td>{{ $item->user->name ?? '--' }}</td>
                                @endcan
                                <td>
                                    <a href="{{ route('admin.residences.items.list', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>
                                    @if ($item->categories != null)
                                        @foreach ($item->categories as $cat)
                                            <span class="label label-info">{{ $cat->name }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>{{ date('d.m.Y', strtotime($item->build_at)) }}</td>
                                <td>{{ $item->all_flats }}</td>
                                <td>{{ $item->ItemsCount }}</td>
                                <td>
                                    @if ($item->area != null) {{ $item->area->name }}
                                    @endif
                                </td>
                                <td>{{ $item->images->count() }} <a
                                        href="{{ route('admin.residences.images.list', $item->id) }}">Редактировать</a>
                                </td>
                                <td>
                                    @if ($item->comments != null)
                                        {{ $item->comments->count() }} @endif
                                    <a
                                        href="{{ route('admin.comments.list', ['type' => 'residences', 'id' => $item->id]) }}">
                                        <i class="far fa-comment"></i>
                                    </a>
                                </td>
                                @can('manageItemActivity')
                                    <td>
                                        <input data-url="{{ route('admin.api.residence.edit_status', $item->id) }}"
                                            name="status" type="checkbox" class="ajaxBtnInput" @if ($item->active) checked @endif>
                                    </td>
                                @endcan
                                <td class="buttons__">
                                    {{-- <a href="{{ route('admin.items.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                    <a href="{{ route('admin.residences.edit', [$item->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @can('delete', 'App\Models\Residence')
                                        <a class="btn btn-delete delete-alert"
                                            data-action="{{ route('admin.residences.destroy', [$item->id]) }}"
                                            data-title="{{ __('admin.modal_delete_title') }}"
                                            data-text="{{ __('admin.modal_delete_text') }}"
                                            data-success="{{ __('admin.modal_delete_success') }}"
                                            data-error-title="{{ __('admin.modal_error_title') }}"
                                            data-error="{{ __('admin.modal_error') }}" href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                </table>
                {{ $list->links() }}
            @else
                {{ __('admin.data_error') }}
            @endif
        </div>
    </div>
@endsection
