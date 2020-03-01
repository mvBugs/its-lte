<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Имя', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Новый пароль', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    {!! Form::label('password_confirmation', 'Подтвердите пароль', ['class' => 'control-label']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
</div>

{{--
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('roles', 'Роль пользователя', ['class' => 'control-label']) !!}
    <div class="">
        {!! Form::select('roles[]', $roles, empty($user) ? null : $user->getRoleNames(), ['class' => 'form-control', 'multiple'=>true, 'disabled' => (isset($user->id) && (\Auth::id() == $user->id)) ? 'disabled' : null]) !!}
        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
    </div>
</div>
--}}

@include('admin.includes.btn-entity-save')
