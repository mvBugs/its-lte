
{{--{{ dd(\UrlAliasLocalization::getSupportedLocales()) }}--}}
{{--@include('admin.fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($item) ? $item->publish : 1,
])--}}


{{--<div class="form-group {{ $errors->has('login') ? 'has-error' : ''}}">
    {!! Form::label('login', 'Логин', ['class' => 'control-label']) !!}
    {!! Form::text('login', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('login', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Телефон', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Пароль', ['class' => 'control-label']) !!}
    {!! Form::text('password', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>--}}

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Цена', ['class' => 'control-label']) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<button class="btn btn-success">Сохранить</button>





