@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Материал типа: '.$eType->name,
        'url_back' => session('admin.nodes.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">

        <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title"> Редактирование материала <strong>{{ $node->name }}</strong></h3>

            <div class="box-tools pull-right">
{{--                {{ dd(UrlAliasLocalization::getLocalesModelsBound($node)) }}--}}
{{--                {{ dd($node->urlAlias->locale_bound) }}--}}
                <ul class="pagination pagination-sm inline">
                    @foreach(UrlAliasLocalization::getLocalesModelsBound($node->urlAlias->locale_bound) as $key => $locale)
                        <li @if($key == $node->locale) class="active" @endif>
                            @if ($locale['model'])
                                <a href="{{ route('admin.nodes.edit', $locale['model']) }}">{{ strtoupper($key)}}</a>
                            @else
                                <a href="{{ route('admin.nodes.create', ['locale_bound' => $node->urlAlias->locale_bound, 'locale' => $key, 'type' => $eType->system_name]) }}">{{ strtoupper($key)}}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>

                &nbsp;
                @include('admin.inc.entity-navigation', [
                   'next' => $node->previous() ? route('admin.nodes.edit', $node->previous()) : '',
                   'previous' => $node->next() ? route('admin.nodes.edit', $node->next()) : '',
                ])
            </div>
        </div>
        <div class="box-body">
            <!--tabs-->
            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Материал' => route('admin.nodes.edit', $node), 'SEO' => route('admin.nodes.seo', $node)] as $title => $path)
                        <li class="@if(Request::url() == rtrim($path, '/')) active @endif"><a href="@if(Request::url() !== rtrim($path, '/')){{ $path }}@else # @endif">{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        @php($tab = isset($tab) ? $tab : request('tab'))
                        @if($tab == 'seo')
                            {!! Form::model($node->metaTag, [
                                'method' => 'POST',
                                'route' => ['admin.nodes.seo.save', $node],
                            ]) !!}
                            @include('admin.nodes._seo', ['model' => $node])
                        @else
                            {!! Form::model($node, [
                                'method' => 'PATCH',
                                'route' => ['admin.nodes.update', $node],
                                'files' => true
                            ]) !!}
                            @include('admin.nodes._form')
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--/tabs-->
        </div>

    </div>
</section>
@stop