@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Тести',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => route('admin.tests.create')
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список курсів</h3>
            </div>
            <div class="box-body">
                @unless($tests->count())
                    @include('admin.fields.empty-rows', [])
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Курс</th>
                                <th>Предмет</th>
                                <th style="width:100px;">Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tests as $test)
                                <tr>
                                    <td>{{ $test->id }}</td>
                                    <td>{{ $test->course->name }}</td>
                                    <td>{{ $test->subject->name }}</td>

                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            <a href="#" data-url="{{ route('admin.tests.destroy', $test) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
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
                    @include('admin.inc.pagination', ['pages' => $tests])
                </div>
            </div>
        </div>
    </section>
@endsection
