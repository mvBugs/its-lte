@extends('admin.layouts.app')


@php
    $content_header = [
        'page_title' => 'Список типа: '.$eType->name ,
        'url_back' => session('admin.items.index'),
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
                    <h3 class="box-title"> Редактирование списка<strong>{{ $item->name }}</strong></h3>
                    {{--@include('admin.inc.entity-navigation', [
                       'next' => $item->previous() ? route('admin.pages.edit', $item->previous()) : '',
                       'previous' => $item->next() ? route('admin.pages.edit', $item->next()) : '',
                    ])--}}
                </div>
            </div>
            {{--<div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    @foreach(\UrlAliasLocalization::getLocalesOrder() as $key => $locale)
                        @if($key == (isset($item) ? $item->locale : request('locale', 'en')))
                            <li class="active">
                                <a href="#">{{ strtoupper($key)}}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('admin.items.create', ['locale' => $key, 'type' => $eType->system_name]) }}">{{ strtoupper($key)}}</a>
                            </li>
                        @endif

                    @endforeach
                </ul>
            </div>--}}
        </div>
        <div class="box-body">
            <!--tabs-->
            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Список' => route('admin.items.edit', $item), /*'SEO' => route('admin.pages.seo', $item)*/] as $title => $path)
                        <li class="@if(Request::url() == rtrim($path, '/')) active @endif"><a href="@if(Request::url() !== rtrim($path, '/')){{ $path }}@else # @endif">{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        @php($tab = isset($tab) ? $tab : request('tab'))
                        @if($tab == 'seo')
                            {!! Form::model($item->metaTag, [
                                'method' => 'POST',
                                'route' => ['admin.page.seo.save', $item],
                            ]) !!}
                            @include('admin.pages._seo')
                        @else
                            {!! Form::model($item, [
                                'method' => 'PATCH',
                                'route' => ['admin.items.update', $item],
                                'files' => true
                            ]) !!}
                            @include('admin.items._form')
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--/tabs-->
        </div>

    </div>
</section>
@stop