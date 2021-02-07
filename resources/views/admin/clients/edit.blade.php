@extends('admin.layouts.main')
@section('title', 'Редактирование пользователя')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
				<h5>{{ trans('admin.admin-users-edit') }}</h5>
				<div class="ibox-tools">
					<a href="{{ route('admin.settings.users.list') }}">
						<i class="fa fa-th-list"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form class="form-horizontal" action="{{ route('admin.settings.clients.post_edit', $user->id) }}" method="post">
					@csrf
					<div class="form-group">
						<div class="form-controls">
							<label for="name" class="control-label col-lg-2">Имя</label>
							<div class="col-lg-10 m-b-sm">
								<input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-controls">
							<label for="email" class="control-label col-lg-2">E-mail</label>
							<div class="col-lg-10 m-b-sm">
								<input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-controls">
							<label for="email" class="control-label col-lg-2">Телефон</label>
							<div class="col-lg-10 m-b-sm">
								<input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}">
							</div>
						</div>
					</div>
					
					<div class="form-group">
                    <div class="form-controls">
                    <label class="control-label col-lg-2" for="">Роль</label>
                      <div class="col-lg-10">
                        <select name="role" class="input-sm form-control input-s-sm inline">
                           
                           <option value="admin" @if($user->role === 'user')selected="" @endif>Клиент</option>
                           <option value="block" @if($user->role === 'block')selected="" @endif>Гость - доступ запрещен</option>
                           
                        </select>
                        <!-- <span class="help-block m-b-0">Hint here</span> -->
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