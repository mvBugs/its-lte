@extends('admin.layouts.app')


@php
    $content_header = [
        'page_title' => 'Редактировать таксиста',
        'url_back' => session('admin.drivers.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">

        <div class="box-header">
            <div class="row">
                <div class="col-lg-12">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"> Редактирование списка<strong>{{ $driver->name }}</strong></h3>
                </div>
            </div>

        </div>
        <div class="box-body">
            <!--tabs-->
            <div class="nav-tabs-justified">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        {!! Form::model($driver, [
                            'method' => 'PATCH',
                            'route' => ['admin.drivers.update', $driver],
                            'files' => true
                        ]) !!}
                        @include('admin.drivers._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--/tabs-->
        </div>

    </div>
</section>
@stop
