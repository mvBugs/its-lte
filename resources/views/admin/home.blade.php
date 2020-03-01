@extends('admin.layouts.app')

@php
    /*$content_header = [
        'page_title' => 'Формы',
        'small_page_title' => '',
        //'url_back' => route('admin'),
        'url_create' => '',
    ]*/
@endphp

@section('content')
{{--    @include('admin.fields.filter')--}}
    {{--<section class="content">
        @unless($forms->count())
            @include('admin.inc.empty-rows', ['msg_body' => ''])
        @else
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список клиентов</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                --}}{{--<th>Пользователь</th>--}}{{--
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Дополнительные поля</th>
                                <th>Создано</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    @php
                                    $str = '';
                                        if (is_array($form->data)) {
                                            foreach ($form->data as $key => $value) {
                                                $str .= $key.': '.$value.'<br>';
                                            }
                                        }
                                    @endphp
                                    <td>{{ $form->id }}</td>
                                    <td style="width: 70px">{{ $form->name }}</td>
                                    <td style="width: 140px">{{ $form->phone }}</td>
                                    <td>{{ $form->email }}</td>
                                    <td>{!! $str !!}</td>
                                    <td style="width: 80px">{{ $form->created_at->format('Y.d.m') }}</td>
                                    <td>
                                        @include('admin.fields.field-select2-change-status-ajax', [
                                            'selected' => $form->status,
                                            'attributes' => \App\Models\Form::$formStatuses,
                                            'data_url' => route('admin.forms.status', $form),
                                        ])
                                    </td>
                                    <td style="width: 20px">
                                        <div class="btn-group">
                                            --}}{{--<a href="{{ route('admin.forms.edit', $form) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>--}}{{--
                                            <a href="#" data-url="{{ route('admin.forms.destroy', $form) }}" class="btn btn-xs btn-danger js-action-destroy"><i class="fa fa-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endunless
    </section>--}}
@endsection
