@extends('admin.layouts.main')
@section('title', 'Характиристики')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.options_list') }}</h5>
        <div class="ibox-tools">
            <a href="{{ route('admin.options.create') }}">
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
                        <th>{{ __('admin.option_name') }}</th>
                        <th>{{ __('admin.option_value_count') }}</th>
                        <th>{{ __('admin.types') }}</th>
                        <th>{{ __('admin.method-input') }}</th>
                        <th>{{ __('admin.active') }}</th>
                        <th>{{ __('admin.require') }}</th>
                       
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->ValueCount }}</td>
                            <td>
                                @if ($item->types != null)    
                                    @foreach ($item->types as $type)
                                        <span class="label label-info">{{ $type->name }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ trans('admin.method-input-'.$item->method_input) }}
                            </td>
                            <td> 
                                <input data-url="{{ route('admin.api.option.edit_status', $item->id) }}"  
                                       name="status" 
                                       type="checkbox" 
                                       class="ajaxBtnInput" 
                                       @if($item->active) checked  @endif
                                >
                            </td>
                            <td> 
                                <input data-url="{{ route('admin.api.option.edit_require', $item->id) }}"  
                                       name="status" 
                                       type="checkbox" 
                                       class="ajaxBtnInput" 
                                       @if($item->require) checked  @endif
                                >
                            </td>
                            <td class="buttons__">
                                {{-- <a href="{{ route('admin.options.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('admin.options.edit', [$item->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.options.destroy',[$item->id]) }}"
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

