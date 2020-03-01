@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Створення клієнта',
        'url_back' => session('admin.clients.index'),
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
                        <h3 class="box-title">Створення клієнта</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">

                <!--tabs-->
                <div class="nav-tabs-justified">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form action="{{ route('admin.clients.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ім'я</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Прізвище</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="last_name">
                                </div>
                                @include('admin.fields.field-select2-static', [
                                    'label' => 'Курс',
                                    'field_name' => 'course',
                                    'multiple' => 0,
                                    'max' => 1,
                                    'disabled' => 0,
                                    'required' => 1,
                                    'attributes' => /*[1 => 'Новый заказ', 2 => 'В обработке'],*/ \App\Models\Course::all()->pluck('name', 'id')->toArray(),
                                    'selected' => /*isset($product) ? $product->values->pluck('id')->toArray() :*/ [],
                                    'empty_value' => '--не указано--',
                                ])
                                @include('admin.fields.field-checkbox', [
                                    'label' => 'Крок',
                                    'field_name' => 'krok',
                                    'status' => 0,
                                ])
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Кількість кодів</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="count" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Тип телефона</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                                        <option>Android</option>
                                        <option>IOS</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Добавити</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
