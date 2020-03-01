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
                <div class="col-lg-8">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"> Создание списка</h3>

                </div>
            </div>
            <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    @foreach(\UrlAliasLocalization::getLocalesOrder() as $key => $locale)
                        @if($key == request('locale', 'en'))
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
            </div>
        </div>
        <div class="box-body">

            <!--tabs-->
            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Список' => route('admin.items.create'), /*'SEO' => '#'*/] as $title => $url)
                        <li class="@if(Request::url() == rtrim($url, '/')) active @else disabled @endif"><a @if(Request::url() != rtrim($url, '/')) && $url != '#')href="{{ $url }}"@endif>{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        {!! Form::open([
                             'route' => 'admin.items.store',
                             'files' => true
                        ]) !!}
                        @include('admin.items._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
