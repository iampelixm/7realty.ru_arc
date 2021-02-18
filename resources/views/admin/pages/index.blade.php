@extends('admin.layouts.main')
@section('title', 'Список обьектов')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.pages_list') }}</h2>
        <div class="ibox-tools">
            <a href="{{ route('admin.pages.create') }}">
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
                            <th>{{ __('admin.page_name') }}</th>
                            <th>{{ __('admin.page_slug') }}</th>
                            <th>{{ __('admin.active') }}</th>
                            <th>{{ __('admin.page_created') }}</th>
                            <th class="buttons__"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="#">{{ $item->name }}</a></td>
                                <td>{{ $item->slug }}</td>

                                <td>
                                    <input data-url="{{ route('admin.api.page.edit_status', $item->id) }}" name="status"
                                        type="checkbox" class="ajaxBtnInput" @if ($item->active) checked @endif>
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>

                                <td class="buttons__">
                                    {{-- <a href="{{ route('admin.pages.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                    <a href="{{ route('admin.pages.edit', [$item->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a class="btn btn-delete delete-alert"
                                        data-action="{{ route('admin.pages.destroy', [$item->id]) }}"
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
