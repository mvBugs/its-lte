
@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Заказы: ',
        'small_page_title' => '',
        'url_back' => '',
        //'url_create' => route('admin.drivers.create')
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список ({{ $orders->total() }})</h3>
            </div>
            <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:35px;">#</th>
                                <th>Цена</th>
                                <th>Время</th>
                                <th>Откуда</th>
                                <th>Куда</th>
                                <th>Комментарий</th>
                                <th>Водитель</th>
                                <th>Статус</th>
                                {{--
                                <th style="text-align: center">Опубликовано</th>
                                --}}
                                <th style="width:100px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->date->format('d-m-Y H:i') }}</td>
                                    <td>{{ $order->fromCity->name }}</td>
                                    <td>{{ $order->toCity->name }}</td>
                                    <td>{{ $order->comment }}</td>
                                    <td>
                                        @if($driver = $order->driver)
                                            {{ $driver->login }}
                                        @endif
                                    </td>
                                    <td>{{ $order->status }}</td>
                                    <td style="width: 110px">
                                        <div class="btn-group">
                                            {{--<a href="{{ route('admin.drivers.edit', $driver) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>--}}
                                            <a href="#" data-url="{{ route('admin.intercity-orders.destroy', $order) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="box-footer">
                <div class="pull-right">
                    @include('admin.inc.pagination', ['pages' => $orders])
                </div>
            </div>
        </div>
    </section>
@endsection
