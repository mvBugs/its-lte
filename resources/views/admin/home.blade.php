@extends('admin.layouts.app')

@php
    /*$content_header = [
        'page_title' => 'Формы',
        'small_page_title' => '',
        //'url_back' => route('admin'),
        'url_create' => '',
    ]*/
@endphp

@section('content')
    <section class="content">
        <div class="row">
            @foreach($locations as $location)
                <div class="col-md-3">
                <div class="box">
                    <div class="box-body">

                        <!--tabs-->

                        <div class="nav-tabs-justified">
                            <div class="tab-content">
                                <h3>{{ $location->name }}</h3>
                                <div class="tab-pane active" id="tab_1">
                                    <br>
                                    {!! Form::model($location, [
                                        'method' => 'PATCH',
                                        'route' => ['admin.location.update', $location],
                                    ]) !!}
                                        <div class="form-group {{ $errors->has('commission') ? 'has-error' : ''}}">
                                            {!! Form::label('commission', 'Коммисия', ['class' => 'control-label']) !!}
                                            {!! Form::number('commission', null, ['class' => 'form-control', 'required', 'min'=>0,'max'=>100]) !!}
                                            {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <button class="btn btn-success">Сохранить</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
