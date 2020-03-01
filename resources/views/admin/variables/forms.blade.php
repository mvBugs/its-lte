@extends('admin.layouts.app')


@php
    $content_header = [
        'page_title' => 'Настройки системы',
        'url_back' => '',
        'url_create' => '',
    ]
@endphp

@section('content')
    <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Общии настройки</h3>
                </div>
                <form action="{{ route('admin.variable.save') }}" method="POST">
                    <div class="box-body">
                        @csrf
                        {{--<input type="hidden" name="group" value="prices">--}}
                        <div class="form-group {{ $errors->has('vars.app_name') ? 'has-error' : ''}}">
                            <label for="vars.app_name">Имя сайта</label>
                            <input type="text" class="form-control" name="vars[app_name]" value="{{ variable('app_name') }}">
                            {!! $errors->first('vars.app_name', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('vars.mail_from_address') ? 'has-error' : ''}}">
                            <label for="vars.mail_from_address">Email отправителя</label>
                            <input type="email" class="form-control" name="vars[mail_from_address]" value="{{ variable('mail_from_address') }}">
                            {!! $errors->first('vars.mail_from_address', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('vars.mail_from_name') ? 'has-error' : ''}}">
                            <label for="vars.mail_from_name">Имя отправителя Email</label>
                            <input type="text" class="form-control" name="vars[mail_from_name]" value="{{ variable('mail_from_name') }}">
                            {!! $errors->first('vars.mail_from_name', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('vars.mail_to_address') ? 'has-error' : ''}}">
                            <label for="vars.mail_to_address">Email получателя</label>
                            <input type="text" class="form-control" name="vars[mail_to_address]" value="{{ variable('mail_to_address') }}">
                            {!! $errors->first('vars.mail_to_address', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.mail_to_name') ? 'has-error' : ''}}">
                            <label for="vars.mail_to_name">Имя получателя</label>
                            <input type="text" class="form-control" name="vars[mail_to_name]" value="{{ variable('mail_to_name') }}">
                            {!! $errors->first('vars.mail_to_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        @include('admin.fields.field-checkbox', [
                            'label' => 'Включить ck-editor',
                            'field_name' => 'vars[ck_editor]',
                            'status' => variable('ck_editor'),
                        ])
                    </div>
                    <div class="box-footer">
                        @include('admin.fields.field-form-buttons')
                    </div>
                </form>
            </div>

            {{--<div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Дополнительный код на страницах сайта</h3>
                </div>
                <form action="{{ route('admin.variable.save') }}" method="POST">
                    <div class="box-body">
                        @csrf
                        --}}{{--<input type="hidden" name="group" value="prices">--}}{{--
                        <div class="form-group {{ $errors->has('vars.front_code_in_head') ? 'has-error' : ''}}">
                            {!! Form::label('vars[front_code_in_head]', 'Код в <head>', ['class' => 'control-label']) !!}
                            {!! Form::textarea('vars[front_code_in_head]', variable('front_code_in_head'), ['class' => 'form-control', 'rows' => 5]) !!}
                            {!! $errors->first('vars.front_code_in_head', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.front_code_start_body') ? 'has-error' : ''}}">
                            {!! Form::label('vars[front_code_start_body]', 'Код в начало <body>', ['class' => 'control-label']) !!}
                            {!! Form::textarea('vars[front_code_start_body]', variable('front_code_start_body'), ['class' => 'form-control', 'rows' => 5]) !!}
                            {!! $errors->first('vars.front_code_start_body', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.front_code_end_body') ? 'has-error' : ''}}">
                            {!! Form::label('vars[front_code_end_body]', 'Код в конец <body>', ['class' => 'control-label']) !!}
                            {!! Form::textarea('vars[front_code_end_body]', variable('front_code_end_body'), ['class' => 'form-control', 'rows' => 5]) !!}
                            {!! $errors->first('vars.front_code_end_body', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Какой-то файл</label>
                            <input type="file" id="exampleInputFile" name="vars_file[shop_catalog]">
                        </div>
                        @if(variable('shop_catalog'))
                            <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url(variable('shop_catalog')) }}">Скачать каталог</a>
                        @endif

                    </div>
                    <div class="box-footer">
                        @include('admin.fields.field-form-buttons')
                    </div>
                </form>
            </div>--}}
        </div>

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Инфо. о компании</h3>
                </div>
                <form action="{{ route('admin.variable.save') }}" method="POST">
                    <div class="box-body">
                        @csrf
                        {{--<input type="hidden" name="group" value="prices">--}}
                        <div class="form-group {{ $errors->has('vars.company_email') ? 'has-error' : ''}}">
                            <label for="vars.company_email">Email компании</label>
                            <input type="text" class="form-control" name="vars[company_email]" value="{{ variable('company_email') }}">
                            {!! $errors->first('vars.company_email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.company_phone') ? 'has-error' : ''}}">
                            <label for="vars.company_phone">Телефон компании</label>
                            <input type="text" class="form-control" name="vars[company_phone]" value="{{ variable('company_phone') }}">
                            {!! $errors->first('vars.company_phone', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.company_address') ? 'has-error' : ''}}">
                            <label for="vars.company_address">Текст Email</label>
                            <textarea type="textarea" class="form-control ck-editor ck-small" name="vars[text_email]" rows="4">{{ variable('text_email') }}</textarea>
                            {!! $errors->first('vars.text_email', '<p class="help-block">:message</p>') !!}
                        </div>
                        {{--<div class="form-group {{ $errors->has('vars.company_address') ? 'has-error' : ''}}">
                            <label for="vars.company_address">Адрес компании</label>
                            <input type="text" class="form-control" name="vars[company_address]" value="{{ variable('company_address') }}">
                            {!! $errors->first('vars.company_address', '<p class="help-block">:message</p>') !!}
                        </div>--}}
                        {{--<div class="form-group {{ $errors->has('vars.company_work_schedule') ? 'has-error' : ''}}">
                            <label for="vars.company_work_schedule">График работы компании</label>
                            <input type="text" class="form-control" name="vars[company_work_schedule]" value="{{ variable('company_work_schedule') }}">
                            {!! $errors->first('vars.company_work_schedule', '<p class="help-block">:message</p>') !!}
                        </div>--}}
                        {{--<div class="form-group {{ $errors->has('vars.contact_latitude') ? 'has-error' : ''}}">
                            <label for="vars.contact_latitude">Широта</label>
                            <input type="text" class="form-control" name="vars[contact_latitude]" value="{{ variable('contact_latitude') }}">
                            {!! $errors->first('vars.contact_latitude', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('vars.contact_longitude') ? 'has-error' : ''}}">
                            <label for="vars.contact_longitude">Долгота</label>
                            <input type="text" class="form-control" name="vars[contact_longitude]" value="{{ variable('contact_longitude') }}">
                            {!! $errors->first('vars.contact_longitude', '<p class="help-block">:message</p>') !!}
                        </div>--}}
                        <div class="form-group {{ $errors->has('vars.contact_map_zoom') ? 'has-error' : ''}}">
                            <label for="vars.contact_map_zoom">Масштаб карты</label>
                            <input type="number" min="2" max="20" step="1" class="form-control" name="vars[contact_map_zoom]" value="{{ variable('contact_map_zoom') }}">
                            {!! $errors->first('vars.contact_map_zoom', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="box-footer">
                        @include('admin.fields.field-form-buttons')
                    </div>
                </form>
            </div>

        </div>
    </div>
    </section>
@endsection
