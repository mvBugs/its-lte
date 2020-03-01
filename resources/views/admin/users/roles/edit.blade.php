@extends('admin.layouts.app')

@section('page-header')
    <h1>Редактировать пользователя</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-body">
            <a href="{{ route('admin.user.index') }}" title="Назад"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
            <br />
            <br />
            {!! Form::model($user, [
                'method' => 'PATCH',
                'route' => ['admin.user.update', $user->id],
                'files' => true
            ]) !!}
            @include ('admin.user.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
