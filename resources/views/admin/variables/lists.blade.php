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
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Форма</h3>
                </div>
                <form action="{{ route('admin.variable.save.list') }}" method="POST">
                    <div class="box-body">
                        @csrf
                        {{--<input type="hidden" name="group" value="prices">--}}
                        <div class="row">
                            @foreach(\UrlAliasLocalization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-4">
                                    @include('admin.fields.field-field-list-items', [
                                        'label' => 'Looking for '.$locale['name'],
                                        'field_name' => 'vars_json[looking_'.$key.']',
                                        'placeholder_value' => 'Значение',
                                        'items' => json_decode(variable('looking_'.$key, '[]'), true),
                                    ])
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach(\UrlAliasLocalization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-4">
                                    @include('admin.fields.field-field-list-items', [
                                       'label' => 'Country '.$locale['name'],
                                       'field_name' => 'vars_json[country_'.$key.']',
                                       'placeholder_value' => 'Значение',
                                       'items' => json_decode(variable('country_'.$key, '[]'), true),
                                    ])
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach(\UrlAliasLocalization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-4">
                                    @include('admin.fields.field-field-list-items', [
                                       'label' => 'Price limit '.$locale['name'],
                                       'field_name' => 'vars_json[price_'.$key.']',
                                       'placeholder_value' => 'Значение',
                                       'items' => json_decode(variable('price_'.$key, '[]'), true),
                                    ])
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach(\UrlAliasLocalization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-4">
                                    @include('admin.fields.field-field-list-items', [
                                       'label' => 'Speciality '.$locale['name'],
                                       'field_name' => 'vars_json[speciality_'.$key.']',
                                       'placeholder_value' => 'Значение',
                                       'items' => json_decode(variable('speciality_'.$key, '[]'), true),
                                    ])
                                </div>
                            @endforeach
                        </div>

                    <div class="box-footer">
                        @include('admin.fields.field-form-buttons')
                    </div>
                </form>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Дополнительные списки</h3>
                </div>
                <form action="{{ route('admin.variable.save.list') }}" method="POST">
                    <div class="box-body">
                        @csrf
                        {{--<input type="hidden" name="group" value="prices">--}}
                        @foreach(\UrlAliasLocalization::getSupportedLocales() as $key => $locale)
                            {{--                            {{ dd($locale) }}--}}
                            <div class="col-md-4">
                                @include('admin.fields.field-field-list-items', [
                                  'label' => 'Телефоны '.$locale['name'],
                                  'field_name' => 'vars_json[phones_'.$key.']',
                                  'placeholder_value' => 'Значение',
                                  'items' => json_decode(variable('phones_'.$key, '[]'), true),
                               ])

                                @include('admin.fields.field-links', [
                                   'label' => 'Координаты оффиса '.$locale['name'],
                                   'field_name' => 'vars_json[coordinates]',
                                   'key_key' => 'latitude_'.$key,
                                   'key_value' => 'longitude_'.$key,
                                   'placeholder_key' => 'Широта',
                                   'placeholder_value' => 'Долгота',
                                   'items' => json_decode(variable('coordinates', '[]'), true),
                                ])
                                {{--<div class="form-group {{ $errors->has('vars.contact_latitude_'.$key) ? 'has-error' : ''}}">
                                    <label for="vars.contact_latitude_{{$key}}">Широта {{ $locale['name'] }}</label>
                                    <input type="text" class="form-control" name="vars[contact_latitude_{{$key}}]" value="{{ variable('contact_latitude_'.$key) }}">
                                    {!! $errors->first('vars.contact_latitude_'.$key, '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('vars.contact_longitude_'.$key) ? 'has-error' : ''}}">
                                    <label for="vars.contact_longitude_{{$key}}">Долгота {{ $locale['name'] }}</label>
                                    <input type="text" class="form-control" name="vars[contact_longitude_{{$key}}]" value="{{ variable('contact_longitude_'.$key) }}">
                                    {!! $errors->first('vars.contact_longitude_'.$key, '<p class="help-block">:message</p>') !!}
                                </div>--}}
                            </div>

                        @endforeach
                    </div>
                    <div class="box-footer">
                        @include('admin.fields.field-form-buttons')
                    </div>
                </form>
            </div>
    </section>
    @push('scripts')
        <script>
            if ($('.field-list-items').length) {
                $('.field-list-items').on('click', '.btn-info', function (e) {
                    e.preventDefault()
                    var n = $(this).parents('.field-list-items').find('.btn-info').index(this),
                        length = $(this).parents('.field-list-items').find('.btn-info').length,
                        fieldName = $(this).parents('.field-list-items').data('field-name'),
                        placeholderValue = $(this).parents('.field-list-items').data('placeholder-value'),
                        item = '<tr class="item">'
                            + '<td>'
                            + '<div class="input-group input-group-md">'
                            + '<span class="input-group-btn" style="width: 40%">'
                            + '<input type="text" name="' + fieldName + '[' + (length) + ']" class="form-control" placeholder="' + placeholderValue +' '+ (parseInt(length) + 1) + '">'
                            + '</span>'
                            + '<span class="input-group-btn">'
                            + '<button type="button" class="btn btn-info btn-flat">'
                            + '<i class="fa fa-plus"></i>'
                            + '</button>'
                            + '<button type="button" class="btn btn-danger btn-flat">'
                            + '<i class="fa fa-remove"></i>'
                            + '</button>'
                            + '</span>'
                            + '</div>'
                            + '</td>'
                            + '</tr>"'
                    $(this).parents('.field-list-items').find('.item').eq(n).after(item)
                })

                $('.field-list-items').on('click', '.btn-danger', function (e) {
                    e.preventDefault()
                    var n = $(this).parents('.field-list-items').find('.btn-danger:not(.first)').index(this)

                    $(this).parents('.field-list-items').find('.item').eq(n).remove()
                })
            }
        </script>
    @endpush
@endsection
