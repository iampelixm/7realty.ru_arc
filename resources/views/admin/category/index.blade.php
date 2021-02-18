@extends('admin.layouts.main')
@section('title', 'Список обьектов')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.categorys_list') }}</h2>
        <div class="ibox-tools">
            <a href="{{ route('admin.categories.create') }}">
                <i class="fa fa-plus"></i>
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
                            <th>{{ __('admin.category_name') }}</th>
                            <th>{{ __('admin.category-subcount') }}</th>
                            <th>{{ __('admin.types') }}</th>
                            <th>{{ __('admin.category-type') }}</th>
                            <th>{{ __('admin.special-offer-shot') }}</th>
                            <th>{{ __('admin.show-main') }}</th>
                            <th>{{ __('admin.show-menu') }}</th>
                            <th>{{ __('admin.active') }}</th>
                            <th class="buttons__"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.category.items', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>
                                    @if ($item->main)
                                        <span class="label label-primary">Главная категория</span>
                                    @elseif ($item->parent != null)

                                        @foreach ($item->parent as $parent)
                                            <span class="label label-info">{{ $parent->name }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($item->types != null)
                                        @foreach ($item->types as $type)
                                            <span class="label label-info">{{ $type->name }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($item->main)
                                        {{ trans('admin.category-type-' . $item->type) }}
                                    @endif
                                </td>

                                <td>
                                    <input data-url="{{ route('admin.api.category.edit_offer', $item->id) }}"
                                        name="status" type="checkbox" class="ajaxBtnInput" @if ($item->offer_index > 0) checked @endif>
                                    {{ trans($item->offer_index) }}
                                </td>
                                <td>
                                    <input data-url="{{ route('admin.api.category.edit_show', $item->id) }}"
                                        name="status" type="checkbox" class="ajaxBtnInput" @if ($item->show_main) checked @endif>
                                </td>

                                <td>
                                    <input data-url="{{ route('admin.api.category.edit_menu', $item->id) }}"
                                        name="status" type="checkbox" class="ajaxBtnInput" @if ($item->menu_active) checked @endif>
                                </td>
                                <td>
                                    <input data-url="{{ route('admin.api.category.edit_status', $item->id) }}"
                                        name="status" type="checkbox" class="ajaxBtnInput" @if ($item->active) checked @endif>
                                </td>
                                <td class="buttons__">
                                    {{-- <a href="{{ route('admin.categories.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                    <a href="{{ route('admin.categories.edit', [$item->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a class="btn btn-delete delete-alert"
                                        data-action="{{ route('admin.categories.destroy', [$item->id]) }}"
                                        data-title="{{ __('admin.modal_delete_title') }}"
                                        data-text="{{ __('admin.modal_delete_text') }}"
                                        data-success="{{ __('admin.modal_delete_success') }}"
                                        data-error-title="{{ __('admin.modal_error_title') }}"
                                        data-error="{{ __('admin.modal_error') }}" href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
