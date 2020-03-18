
{{--{{ dd(\UrlAliasLocalization::getSupportedLocales()) }}--}}
{{--@include('admin.fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($item) ? $item->publish : 1,
])--}}


<div class="form-group {{ $errors->has('login') ? 'has-error' : ''}}">
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
</div>

<div class="form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
    {!! Form::label('balance', 'Баланс', ['class' => 'control-label']) !!}
    {!! Form::number('balance', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('balance', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('car_model') ? 'has-error' : ''}}">
    {!! Form::label('car_model', 'Марка - модель', ['class' => 'control-label']) !!}
    {!! Form::text('car_model', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('car_model', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('car_number') ? 'has-error' : ''}}">
    {!! Form::label('car_number', 'Номер автомобиля', ['class' => 'control-label']) !!}
    {!! Form::text('car_number', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('car_number', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('car_color') ? 'has-error' : ''}}">
    {!! Form::label('car_color', 'Цвет автомобиля ', ['class' => 'control-label']) !!}
    {!! Form::text('car_color', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('car_color', '<p class="help-block">:message</p>') !!}
</div>


@include('admin.fields.field-form-buttons', [
    'url_store_and_create' => route('admin.drivers.create'),
    'url_store_and_close' => session('admin.drivers.index'),
    'url_destroy' => isset($item) ? route('admin.drivers.destroy', $item) : '',
    'url_after_destroy' => session('admin.drivers.index'),
    'url_close' => session('admin.drivers.index'),
])




