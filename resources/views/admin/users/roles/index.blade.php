@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Роли пользователей',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => route('admin.roles.create')
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список ролей ({{ $roles->count() }})</h3>
            </div>
            <div class="box-body">
                @unless($roles->count())
                    @include('admin.fields.empty-rows', ['url_create' => route('admin.roles.create')])
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th style="width:100px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->title}}</td>
                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            {{--<a href="{{ route_alias('roles.show', $role) }}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>--}}
                                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-url="{{ route('admin.roles.destroy', $role) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endunless
            </div>

        </div>
    </section>
@endsection
