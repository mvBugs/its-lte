
@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Материал типа: '.$eType->name,
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => route('admin.nodes.create', ['type' => request('type')])
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список ({{ $nodes->total() }})</h3>
            </div>
            <div class="box-body">
                @unless($nodes->count())
                    @include('admin.fields.empty-rows', ['url_create' => route('admin.nodes.create', ['type' => request('type')])])
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Название</th>
                                {{--
                                <th style="text-align: center">Опубликовано</th>
                                <th>Шаблон</th>
                                --}}
                                <th>Дата</th>
                                <th>Язык</th>
                                <th style="width:100px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nodes as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->name }}</td>
                                    {{--
                                     <td style="text-align: center">
                                         @if($page->publish)<i class="fa fa-check-square-o"></i>@else<i class="fa fa-square-o"></i>@endif
                                     </td>

                                     <td>{{ $page->blade ?? 'По умолчанию' }}</td>
                                     --}}
                                    <td>{{ $page->created_at }}</td>
                                    <td>{{ $page->locale }}</td>
                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            <a href="{{ route_alias('node.show', $page) }}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.nodes.edit', $page) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-url="{{ route('admin.nodes.destroy', $page) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endunless
            </div>

            <div class="box-footer">
                <div class="pull-right">
                    @include('admin.inc.pagination', ['pages' => $nodes])
                </div>
            </div>
        </div>
    </section>
@endsection