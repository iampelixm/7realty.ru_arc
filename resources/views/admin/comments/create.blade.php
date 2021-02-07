@extends('admin.layouts.main')
@section('title', 'Создание комментария')
@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.comment_create') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.comments.store', ['type' => $type, 'id' => $object->id]) }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">{{ __('admin.comments_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.comments_name') }}"
                       value="{{ old('name') ?? '' }}" required="">
            </div>

            <div class="form-group">
                <label for="">{{ __('admin.comments_text') }}</label>
                <textarea class="form-control" name="comments">
                    {{ old('comments') ?? '' }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="checkbox" class="form-control" name="active" checked required=""> 
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
