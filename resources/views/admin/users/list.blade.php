@extends('admin.layouts.main')
@section('title', 'Список пользователей')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">

                <div class="ibox-title">
                    <h2>{{ __('admin.admin-users-list') }}</h2>
                    <div class="ibox-tools">
                        <a href="{{ route('admin.settings.users.new') }}">
                            Добавить <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                            <tr>
                                <th>Аватар</th>
                                <th data-toggle="true">id</th>
                                <th data-toggle="true">Имя</th>
                                <th data-toggle="true">E-mail</th>
                                <th data-toggle="true">Роль</th>
                                <th data-toggle="true">Дата создания</th>
                                <th class="text-right" data-sort-ignore="true">Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="aj-shure-container">
                                    <td class="aj-hide">
                                        @if($user->getFirstMedia('avatar'))
                                        {{$user->getFirstMedia('avatar')->img()->attributes(['width'=>'50','height'=>''])}}
                                        @else
                                        <img width="50" src="/storage/avatar/noavatar.jpg">
                                        @endif
                                    </td>
                                    <td class="aj-hide">
                                        {{ $user->id }}
                                    </td>
                                    <td class="aj-hide">
                                        {{ $user->name }}
                                    </td>
                                    <td class="aj-hide">
                                        {{ $user->email }}
                                    </td>
                                    <td class="aj-hide">
                                        {{ __('admin.role-' . $user->roles()->first()->name) }}
                                    </td>
                                    <td class="aj-hide">
                                        {{ $user->created_at }}
                                    </td>

                                    <td class="aj-hide">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.settings.users.edit', $user->id) }}"
                                                    class="btn-white btn btn-xs"><i class="far fa-edit"></i></a>
                                            </div>
                                            <a class="btn btn-delete delete-alert"
                                                data-action="{{ route('admin.settings.users.post_delete', [$user->id]) }}"
                                                data-title="{{ __('admin.modal_delete_title') }}"
                                                data-text="{{ __('admin.modal_delete_text') }}"
                                                data-success="{{ __('admin.modal_delete_success') }}"
                                                data-error-title="{{ __('admin.modal_error_title') }}"
                                                data-error="{{ __('admin.modal_error') }}" href="#">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
