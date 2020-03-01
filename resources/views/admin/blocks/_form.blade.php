<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Название', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('system_name') ? 'has-error' : ''}}">
    {!! Form::label('system_name', 'Системное имя', ['class' => 'control-label']) !!}
    {!! Form::text('system_name', null, ['class' => 'form-control', 'required',  'disabled']) !!}
    {!! $errors->first('system_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    {!! Form::label('body', 'Контент', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control',]) !!}
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>

{{--
<div class="form-group {{ $errors->has('blade') ? 'has-error' : ''}}">
    {!! Form::label('blade', 'Шаблон', ['class' => 'control-label']) !!}
    {!! Form::select('blade', [
        null => 'По умолчанию',
        'front.pages.home' => 'Домашняя страница',
        'front.pages.about' => 'О нас',
        'front.pages.payment' => 'Оплата и доставка',
        'front.pages.policy' => 'Политика конф.',
        'front.pages.cooperation' => 'Сотрудничество',
        //'front.pages.buy' => 'Где купить',
        'front.pages.faq' => 'Вопросы и контакты',
        'front.pages.questions' => 'Вопрос-ответ',
        'front.pages.contacts' => 'Контакты',
        'front.pages.study' => 'Обучение',
        ], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
    {!! $errors->first('blade', '<p class="help-block">:message</p>') !!}
</div>
--}}

@include('admin.fields.field-form-buttons', [
    'url_store_and_create' => route('admin.blocks.create'),
    'url_store_and_close' => session('admin.blocks.index'),
    'url_destroy' => isset($block) ? route('admin.blocks.destroy', $block) : '',
    'url_after_destroy' => session('admin.blocks.index'),
    'url_close' => session('admin.blocks.index'),
])
