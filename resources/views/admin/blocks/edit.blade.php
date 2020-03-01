@extends('admin.layouts.app')


@php
    $content_header = [
        'page_title' => 'Блоки',
        'url_back' => session('admin.blocks.index'),
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
                    <h3 class="box-title"> Редактирование блока <strong>{{ $block->name }}</strong></h3>
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
                <ul class="nav nav-tabs">
                    @foreach(['Страница' => route('admin.blocks.edit', $block), /*'SEO' => route('admin.pages.seo', $node)*/] as $title => $path)
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
                                //'route' => ['admin.page.seo.save', $node],
                            ]) !!}
                            @include('admin.pages._seo')
                        @else
                            {!! Form::model($block, [
                                'method' => 'PATCH',
                                'route' => ['admin.blocks.update', $block],
                                'files' => true
                            ]) !!}
                            @includeFirst(["admin.blocks.forms.$block->type", 'admin.blocks._form'])
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--/tabs-->
        </div>

    </div>
</section>
@stop