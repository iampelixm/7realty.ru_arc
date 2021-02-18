@extends('admin.layouts.main')
@section('title', 'Создание пользователя')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h2>Создание пользователя бэкэнда</h2>
                    <div class="ibox-tools">
                        <a href="{{ route('admin.settings.users.list') }}">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" enctype="multipart/form-data"
                        {{ route('admin.settings.users.post_new') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="name" class="control-label col-lg-2">Имя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="name" id="name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="email" class="control-label col-lg-2">E-mail</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="email" id="email" value="">
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
                                        <option value="admin">Администратор</option>
                                        <option value="moderator">Модератор</option>
                                        <option value="broker">Брокер</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label col-lg-2" for="">Аватар пользователя</label>
                                <div class="col-lg-10">
                                    <label for="avatar" class="control-label col-lg-2">Загрузить аватар</label>
                                    <div class="col-lg-10 m-b-sm">
                                        <input class="form-control" type="file" name="avatar" id="avatar" value="">
                                    </div>
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
