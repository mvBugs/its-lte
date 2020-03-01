@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Курси',
        'url_back' => session('admin.courses.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-8">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Створення курсу</h3>
                </div>
            </div>
        </div>
        <div class="box-body">

            <!--tabs-->
            <div class="nav-tabs-justified">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        {!! Form::open([
                             'route' => 'admin.courses.store',
                             'files' => true
                        ]) !!}
                        @include('admin.courses._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
