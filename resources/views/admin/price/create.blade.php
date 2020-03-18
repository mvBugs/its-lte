@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Добавить таксиста',
        'url_back' => session('admin.drivers.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title"> Добавить таксиста</h3>

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
                                     'route' => 'admin.drivers.store',
                                     'files' => true
                                ]) !!}
                                @include('admin.drivers._form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
