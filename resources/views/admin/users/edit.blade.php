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
                    @if ($user->getFirstMedia('avatar'))
                        {{ $user->getFirstMedia('avatar')->img()->attributes(['width' => '150', 'height' => '']) }}
                    @else
                        <img class="py-4 " width="150" src="/storage/avatar/noavatar.jpg">
                    @endif
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
                                <label class="control-label" for="position">Должность</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="position" id="position"
                                        value="{{ $user->position ?? 'Брокер' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label col-lg-2" for="">Подразделение</label>
                                <div class="col-lg-10">
                                    <select name="department" class="input-sm form-control input-s-sm inline">
                                        <option value="town_ned" {{ $user->department == 'town_ned' ? 'selected' : '' }}>
                                            Городская недвижимость
                                        </option>
                                        <option value="zagorod_ned"
                                            {{ $user->department == 'zagorod_ned' ? 'selected' : '' }}>
                                            Загородная недвижимость
                                        </option>
                                        <option value="commercial_ned"
                                            {{ $user->department == 'commercial_ned' ? 'selected' : '' }}>
                                            Коммерческая недвижимость
                                        </option>
                                        <option value="invest_ned"
                                            {{ $user->department == 'invest_ned' ? 'selected' : '' }}>
                                            Инвестиционная недвижимость
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="control-label" for="description">
                            Дополнительно
                        </label>
                        {{ print_r($user->additional, true) }}
                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="additional_stazh">
                                    Стаж в компании
                                </label>
                                <div class="col-lg-10 m-b-sm">
                                    <input type="text" name="additional['stazh']" id="additional_stazh" class="form-control"
                                        value="{{ $broker->additional->stazh ?? '7' }}"> лет
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="additional_sdelok">
                                    Успешных сделок
                                </label>
                                <div class="col-lg-10 m-b-sm">
                                    <input type="text" name="additional['sdelok']" id="additional_sdelok"
                                        class="form-control" value="{{ $broker->additional->sdelok ?? '77' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="additional_obrazovanie">Образование</label>
                                <div class="col-lg-10 m-b-sm">
                                    <textarea class="form-control summernote" name="additional[obrazovanie]"
                                        id="additional_obrazovanie">{!! $user->additional->obrazovanie ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="additional_opit">Опыт работы</label>
                                <div class="col-lg-10 m-b-sm">
                                    <textarea class="form-control summernote" name="additional[opit]"
                                        id="additional_opit">{!! $user->additional->opit ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="additional_lichno">Лично от себя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <textarea class="form-control summernote" name="additional[lichno]"
                                        id="additional_lichno">{!! $user->additional->lichno ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label" for="description">Описание пользователя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <textarea class="form-control summernote" name="description"
                                        id="description">{!! $user->description ?? 'Описание' !!}</textarea>
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
