@extends('admin.layouts.main')
@section('title', 'Создание пользователя')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h2>Создать клиента</h2>
                    <div class="ibox-tools">
                        <a href="{{ route('admin.settings.clients.list') }}">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{ route('admin.settings.clients.post_new') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="name" class="control-label col-lg-2">Имя</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                <label for="email" class="control-label col-lg-2">E-mail</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="email" id="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label for="email" class="control-label col-lg-2">Телефон</label>
                                <div class="col-lg-10 m-b-sm">
                                    <input class="form-control" type="text" name="phone" id="phone"
                                        value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <label class="control-label col-lg-2" for="">Роль</label>
                                <div class="col-lg-10">
                                    <select name="role" class="input-sm form-control input-s-sm inline">
                                        <option value="user">Клиент</option>
                                        <option value="block">Гость - доступ запрещен</option>
                                    </select>
                                    <!--  <span class="help-block m-b-0">Hint here</span> -->
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
