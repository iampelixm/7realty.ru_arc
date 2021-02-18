@extends('admin.layouts.main')
@section('title', 'Редактивароие комментария')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.comments_edit') }}</h2>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.comments.update', ['type' => $type, 'id' => $id, 'comment' => $comment->id]) }}"
            enctype="multipart/form-data" method="POST" role="form">
            @csrf

            <div class="form-group">
                <label for="">{{ __('admin.comments_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.comments_name') }}"
                    value="{{ old('name') ?? ($comment->name ?? '') }}" required="">
            </div>
            <div class="form-group">
                <label for="">{{ __('admin.comments_text') }}</label>
                <textarea class="form-control" name="comments">
                        {{ old('comments') ?? ($comment->comments ?? '') }}
                    </textarea>
            </div>
            <div class="form-group">
                <label for="active">{{ __('admin.active') }}</label>
                <input type="checkbox" class="form-control" name="active" @if ($comment->active) checked @endif>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
