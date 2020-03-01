@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Клієнти',
        'small_page_title' => '',
        'url_back' => route('admin.clients.index'),
        'url_create' => route('admin.clients.create')
    ]
@endphp

@section('content')
{{--    onclick="document.location.href='{{ route('client.create') }}'"--}}
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список Клієнтів</h3>
        </div>
        <div class="box-body">
            @unless($clients->count())
                @include('admin.fields.empty-rows', [])
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ім'я</th>
                            <th scope="col">Фамілія</th>
                            <th scope="col">Курс</th>
                            <th scope="col">Крок</th>
                            <th scope="col">Тип</th>
                            <th scope="col">код</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->course->name }}</td>
                                <td>{{ $client->krok }}</td>
                                <td>{{ $client->type }}</td>
                                <td>{{ $client->key }}</td>
                                <td>
                                    <a href="#" data-url="{{ route('admin.clients.destroy', $client) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
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
                @include('admin.inc.pagination', ['pages' => $clients])
            </div>
        </div>
    </div>
</section>
@endsection
