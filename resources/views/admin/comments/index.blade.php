@extends('admin.layouts.main')
@section('title', 'Комментарии')
@section('content')
    <div class="ibox-title">
        <h2>{{ __('admin.comments_list') }}: @if (isset($object)) {{ $object->name }}
            @endif
        </h2>
        <div class="ibox-tools">
            <a href="{{ route('admin.comments.create', ['type' => $type, 'id' => $object->id]) }}">
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
                            <th>{{ __('admin.comments_name') }}</th>
                            <th>{{ __('admin.comments_text') }}</th>
                            <th>{{ __('admin.active') }}</th>

                            <th class="buttons__"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->comments }}</td>
                                <td>
                                    <input data-url="{{ route('admin.api.comment.edit_status', $item->id) }}"
                                        name="status" type="checkbox" class="ajaxBtnInput" @if ($item->active) checked @endif>
                                </td>
                                <td class="buttons__">
                                    {{-- <a href="{{ route('admin.areas.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                    <a
                                        href="{{ route('admin.comments.edit', ['type' => $type, 'id' => $object->id, 'comment' => $item->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.comments.delete', ['type' => $type, 'id' => $object->id, 'comment' => $item->id]) }}"
                                        style="color: red;">
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
