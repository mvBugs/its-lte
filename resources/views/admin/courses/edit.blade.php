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
                <div class="col-lg-12">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"> Редагування курсу <strong>{{ $course->name }}</strong></h3>
                    {{--@include('admin.inc.entity-navigation', [--}}
                       {{--'next' => $node->previous() ? route('admin.pages.edit', $block->previous()) : '',--}}
                       {{--'previous' => $node->next() ? route('admin.pages.edit', $block->next()) : '',--}}
                    {{--])--}}
                </div>
            </div>
        </div>
        <div class="box-body">
            <!--tabs-->
            <div class="nav-tabs-justified">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                            {!! Form::model($course, [
                                'method' => 'PATCH',
                                'route' => ['admin.courses.update', $course],
                                'files' => true
                            ]) !!}
                            @include('admin.courses._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--/tabs-->
        </div>

    </div>
</section>
@stop
