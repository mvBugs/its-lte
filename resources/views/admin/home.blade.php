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

    <section class="content">
        <div class="box">
{{--            <div class="box-header">
                <h3 class="box-title">Список ({{ $drivers->total() }})</h3>
            </div>--}}
            <div class="box-body">
{{--                @unless($drivers->count())
                    @include('admin.inc.empty-rows', ['url_create' => route('admin.drivers.create', ['type' => request('type')])])
                @else--}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Откуда</th>
                                <th>Куда</th>
                                <th>Цена</th>
                                {{--
                                <th style="text-align: center">Опубликовано</th>
                                --}}
                                <th style="width:100px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $price)
                                <tr>
                                    <td>{{ $price->id }}</td>
                                    <td>{{ $price->toCity->name }}</td>
                                    <td>{{ $price->fromCity->name }}</td>
                                    <td>{{ $price->price }}</td>
                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.price.edit', $price) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                            {{--<a href="#" data-url="{{ route('admin.price.update', $price) }}" data-key="{{ $price->id }}" class="btn btn-xs btn-success js-action-change-price"><i class="fa fa-save"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                {{--@endunless--}}
            </div>
        </div>
    </section>
@endsection
