@extends('admin.layouts.main')
@section('title', 'Список обьектов')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.items_list') }}</h5>
        <div class="ibox-tools">
            <a href="{{ route('admin.items.create') }}">
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
                        <th>{{ __('admin.item_image') }}</th>
                        <th>{{ __('admin.item_name') }}</th>
                        <th>{{ __('admin.item_square') }}</th>
                        <th>{{ __('admin.item_price') }}</th>
                        <th>{{ __('admin.item_category') }}</th>
                        <th>{{ __('admin.item_options_count') }}</th>
                        <th>{{ __('admin.comments') }}</th>
                        <th>{{ __('admin.areas_name') }}</th>
                        <th>{{ __('admin.item_images_count') }}</th>
                        <th>{{ __('admin.item-residence-name') }}</th>
                        <th>{{ __('admin.item_type') }}</th>
                        <th>{{ __('admin.active') }}</th>
                        <th>{{ __('admin.item-offers') }}</th>
                        
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td> @if ($item->FirstImage != null)
                                <img src="{{ url('storage/items/'.$item->id.'/'.$item->FirstImage->file) }}" style="max-height: 100px;">
                                @else
                                    (no-image)
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->square }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                @if ($item->categories != null)    
                                    @foreach ($item->categories as $cat)
                                        <span class="label label-info">{{ $cat->name }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $item->OptionsCount }}</td>
                             <td>
                                @if ($item->comments != null) {{ $item->comments->count() }} @endif
                                <a href="{{ route('admin.comments.list', ['type'=>'items', 'id' => $item->id]) }}">
                                    <i class="far fa-comment"></i>
                                </a>
                             </td>
                            <td> @if ($item->area != null) {{ $item->area->name  }} @endif</td>
                            <td>{{ $item->images->count() }} <a href="{{ route('admin.items.images.list', $item->id) }}"><i class="far fa-edit"></i> Ред.</a></td>
                            <td>@if($item->residence){{ $item->residence->name }}@else нету @endif</td>
                            <td>@if($item->type){{ $item->type->name }}@else нету @endif</td>
                            <td>
                                <input data-url="{{ route('admin.api.item.edit_status', $item->id) }}"  
                                       name="status" 
                                       type="checkbox" 
                                       class="ajaxBtnInput" 
                                       @if($item->active) checked  @endif
                                >
                            </td>
                            <td>
                                <input data-url="{{ route('admin.api.item.edit_offer', $item->id) }}"  
                                       name="status" 
                                       type="checkbox" 
                                       class="ajaxBtnInput" 
                                       @if($item->offer_index > 0) checked  @endif
                                > ({{ $item->offer_index }})
                            </td>
                            <td class="buttons__">
                                {{-- <a href="{{ route('admin.items.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('admin.items.edit', [$item->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.items.destroy',[$item->id]) }}"
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

            @else
                {{ __('admin.data_error') }}
            @endif
        </div>
    </div>
@endsection




