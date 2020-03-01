@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Курси',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => route('admin.courses.create')
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список курсів</h3>
            </div>
            <div class="box-body">
                @unless($courses->count())
                    @include('admin.fields.empty-rows', [])
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Назва</th>
                                <th style="width:100px;">Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->name }}</td>

                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-url="{{ route('admin.courses.destroy', $course) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
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
                    @include('admin.inc.pagination', ['pages' => $courses])
                </div>
            </div>
        </div>
    </section>
@endsection
