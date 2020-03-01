@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" onclick="document.location.href='{{ route('admin.clients.create') }}'">Створити</button>
                    <button type="button" class="btn btn-secondary" onclick="document.location.href='{{ route('admin.clients.index') }}'">Список всіх</button>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ім'я</th>
                            <th scope="col">Фамілія</th>
                            <th scope="col">Тип</th>
                            <th scope="col">код</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ $client->first_name }}</td>
                            <td>{{ $client->last_name }}</td>
                            <td>{{ $client->type }}</td>
                            <td>{{ $client->key }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
