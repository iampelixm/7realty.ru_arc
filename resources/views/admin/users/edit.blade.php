@extends('admin.layouts.main')
@section('title', 'Редактирование пользователя')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h2>{{ __('admin.admin-users-edit') }}</h2>
                    {{-- Под вопросом оставить или убрать этот элемент
				<div class="ibox-tools">
					<a href="{{ route('admin.settings.users.list') }}">
						<i class="fa fa-th-list"></i>
					</a>
				</div> --}}
                </div>
                <div class="ibox-content">
                    <img class="py-4 " width="150"
                        src="{{ file_exists('storage/avatar/' . $user->email . '.jpg') ? '/storage/avatar/' . $user->email . '.jpg' : '/storage/avatar/noavatar.jpg' }}">
                    <form class="form-horizontal" enctype="multipart/form-data"
                        action="{{ route('admin.settings.users.post_edit', $user->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="name" class="control-label col-lg-2">Имя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="email" class="control-label col-lg-2">E-mail</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="email" id="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="password" class="control-label col-lg-2">Пароль</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="password" name="password" id="password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label col-lg-2" for="">Роль</label>
                                <div class="col-lg-10">
                                    <select name="role" class="input-sm form-control input-s-sm inline">

                                        <option value="admin" {{ $user->isA('admin') ? 'selected' : '' }}>Администратор
                                        </option>
                                        <option value="moderator" {{ $user->isA('moderator') ? 'selected' : '' }}>
                                            Модератор
                                        </option>
                                        <option value="broker" {{ $user->isA('broker') ? 'selected' : '' }}>Брокер
                                        </option>
                                        <option value="blocked" {{ $user->isA('blocked') ? 'selected' : '' }}>Уволен
                                        </option>

                                    </select>
                                    <!-- <span class="help-block m-b-0">Hint here</span> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="avatar">Аватар пользователя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="file" name="avatar" id="avatar" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="description">Описание пользователя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <textarea class="form-control summernote" name="description"
                                        id="description">{{ $user->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-lg btn-primary" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
