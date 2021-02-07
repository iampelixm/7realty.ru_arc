@extends('admin.layouts.main')
@section('title', 'Список изображений')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.images_list') }}: {{ $item->name }}</h5>
        <div class="ibox-tools">
            <a href="{{ route('admin.items.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            @if($item->images != null)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>{{ __('admin.item_image') }}</th>
                        <th>{{ __('admin.active') }}</th>
                        <th>{{ __('admin.order_number') }}</th>
                        
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td><img src="{{ url('storage/residences/'.$item->id.'/'.$image->file) }}" style="max-height: 100px;"></td>
                            <td>
                                

                                <a href="{{ route('admin.residences.images.edit_status', ['item' => $item->id, 'image' => $image->id]) }}">
                                    @if ($image->active)
                                    <i class="fas fa-eye"></i>
                                    @else
                                    <i class="fas fa-eye-slash"></i>
                                    @endif
                                </a>
                               <!--  <input type="checkbox" name="" @if($image->active) checked @endif> -->
                            </td>
                            <td>
                                {{ $image->order_number }}
                                @if ($image->order_number > 1) 
                                    <a href="{{ route('admin.residences.images.up', ['item' => $item->id, 'image' => $image->id]) }}">
                                        <i class="far fa-arrow-alt-circle-up"></i>
                                    </a>
                                    
                                @endif
                                @if ($image->order_number < $item->images->count())
                                    <a href="{{ route('admin.residences.images.down', ['item' => $item->id, 'image' => $image->id]) }}">
                                        <i class="far fa-arrow-alt-circle-down"></i>
                                    </a> 
                                @endif

                                 @if (isset($item->FirstImage) and  ($image->id == $item->FirstImage->id))
                                    <span class="label label-primary">Главная картинка</span>
                                @endif
                                
                            </td>
                            <td class="buttons__">
                                 <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.residences.images.delete',['item' => $item->id, 'image' => $image->id]) }}"
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

            <form action="{{ route('admin.residences.images.add', $item->id) }}" enctype="multipart/form-data" method="POST" role="form">
                @csrf

                <div class="form-group">
                    <label for="">{{ __('admin.item-image-add') }}</label>
                    <input type="file" class="form-control" name="photos[]" multiple />
                    
                </div>
                
                
                <button type="submit" class="btn btn-primary">{{ __('admin.add') }}</button>
            </form>
        </div>
    </div>
@endsection

