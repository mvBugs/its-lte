@extends('admin.layouts.app')


@php
    $content_header = [
        'page_title' => 'Редактировать цену',
        'url_back' => session('admin.home'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="box-body">
                    <!--tabs-->
                    <div class="nav-tabs-justified">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <br>
                                {!! Form::model($price, [
                                    'method' => 'PATCH',
                                    'route' => ['admin.price.update', $price],
                                    'files' => true
                                ]) !!}
                                @include('admin.price._form')
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
