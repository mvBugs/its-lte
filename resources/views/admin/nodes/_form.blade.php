@php
    if (isset($node)) {
        $type = $node->type;
    } else {
        $type = request('type');
    }
    $loc = isset($node) ? $node->locale : request('locale', 'en');
@endphp

@include('admin.fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($node) ? $node->publish : 1,
])

<input type="hidden" name="locale" value="{{ isset($node) ? $node->locale : request('locale', 'en') }}">
<input type="hidden" name="locale_bound" value="{{ request('locale_bound') }}">
<input type="hidden" name="type" value="{{ $type }}">

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Название', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('data.fields.body') ? 'has-error' : ''}}">
    {!! Form::label('data[fields][body]', 'Контент', ['class' => 'control-label']) !!}
    {!! Form::textarea('data[fields][body]', isset($node) ? ($node->data['fields']['body'] ?? '') : '', ['class' => 'form-control ck-editor ck-full', 'rows' => 5]) !!}
    {!! $errors->first('data.fields.body', '<p class="help-block">:message</p>') !!}
</div>

@if(in_array($type, ['offers', 'news']))
    <div class="form-group {{ $errors->has('data.fields.mini_text') ? 'has-error' : ''}}">
        {!! Form::label('data[fields][mini_text]', 'Краткое описание', ['class' => 'control-label']) !!}
        {!! Form::textarea('data[fields][mini_text]', isset($node) ? ($node->data['fields']['mini_text'] ?? '') : '', ['class' => 'form-control', 'rows' => 3]) !!}
        {!! $errors->first('data.fields.mini_text', '<p class="help-block">:message</p>') !!}
    </div>
@endif

    @if(in_array(request('type') ?? $node->type, ['offers']))
        @include('admin.fields.field-image-uploaded',[
            'label' => 'Изображение',
            'field_name' => 'image',
            'entity' => isset($node) ? $node : null,
        ])
        <div class="form-group {{ $errors->has('data.blade') ? 'has-error' : ''}}">
            {!! Form::label('data[blade]', 'Шаблон', ['class' => 'control-label']) !!}
            {!! Form::select('data[blade]', [
                'front.offers.show' => 'Предложения',
            ], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
            {!! $errors->first('data.blade', '<p class="help-block">:message</p>') !!}
        </div>
    @elseif(in_array(request('type') ?? $node->type, ['news']))
        @include('admin.fields.field-image-uploaded',[
            'label' => 'Изображение',
            'field_name' => 'image',
            'entity' => isset($node) ? $node : null,
        ])
        <div class="form-group {{ $errors->has('data.blade') ? 'has-error' : ''}}">
            {!! Form::label('data[blade]', 'Шаблон', ['class' => 'control-label']) !!}
            {!! Form::select('data[blade]', [
                'front.news.show' => 'Новости',
            ], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
            {!! $errors->first('data.blade', '<p class="help-block">:message</p>') !!}
        </div>
    @else
    <div class="form-group {{ $errors->has('data.blade') ? 'has-error' : ''}}">
        {!! Form::label('data[blade]', 'Шаблон', ['class' => 'control-label']) !!}
        {!! Form::select('data[blade]', [
            'front.pages.home' => 'По умолчанию',
            'front.pages.home' => 'Домашняя страница',
            'front.pages.activities' => 'Деятельность',
            'front.pages.forum' => 'Форум',
            'front.pages.contacts' => 'Контакты',
            ], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
        {!! $errors->first('data.blade', '<p class="help-block">:message</p>') !!}
    </div>
@endif


@empty($node)
<div class="form-group {{ $errors->has('url_alias') ? 'has-error' : ''}}">
    {!! Form::label('url_alias', 'URL-алиас', ['class' => 'control-label']) !!}
    {!! Form::text('url_alias', isset($node) ? optional($node->urlAlias)->alias : null, ['class' => 'form-control', isset($node) ? 'readonly' : '']) !!}
    {!! $errors->first('url_alias', '<p class="help-block">:message</p>') !!}
</div>
@endempty

@include('admin.fields.field-form-buttons', [
    'url_store_and_create' => route('admin.nodes.create'),
    'url_store_and_close' => session('admin.nodes.index'),
    'url_destroy' => isset($node) ? route('admin.nodes.destroy', $node) : '',
    'url_after_destroy' => session('admin.nodes.index'),
    'url_close' => session('admin.nodes.index'),
])
