@extends('admin.layouts.main')
@section('title', 'Список районов')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.areas_list') }}</h5>
        <div class="ibox-tools">
            <a href="{{ route('admin.areas.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            @if($list->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>{{ __('admin.item_name') }}</th>
                        <th>{{ __('admin.item-city-name') }}</th>
                        <th>{{ __('admin.comments') }}</th>
                        <th>{{ __('admin.active') }}</th>
                        
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('admin.areas.items', $item->id) }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>@if ($item->city != null) {{ $item->city->name }} @endif</td>
                            <td>
                                @if ($item->comments != null) {{ $item->comments->count() }} @endif
                                <a href="{{ route('admin.comments.list', ['type'=>'areas', 'id' => $item->id]) }}">
                                    <i class="far fa-comment"></i>
                                </a>
                             </td>
                            <td> <input data-url="{{ route('admin.api.area.edit_status', $item->id) }}"  
                                       name="status" 
                                       type="checkbox" 
                                       class="ajaxBtnInput" 
                                       @if($item->active) checked  @endif
                                >
                            </td>
                            <td class="buttons__">
                                {{-- <a href="{{ route('admin.areas.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('admin.areas.edit', [$item->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.comments.list', ['type'=>'areas', 'id' => $item->id]) }}">
                                    <i class="far fa-comment"></i>
                                </a>

                                <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.areas.destroy',[$item->id]) }}"
                                   data-title="{{ __('admin.modal_delete_title') }}"
                                   data-text="{{ __('admin.modal_delete_text') }}"
                                   data-success="{{ __('admin.modal_delete_success') }}"
                                   data-error-title="{{ __('admin.modal_error_title') }}"
                                   data-error="{{ __('admin.modal_error') }}"
                                   href="#">
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

