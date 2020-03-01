{{--{{ dd($item->locale) }}--}}
@php
    $locale = isset($item) ? $item->locale : request('locale', 'en');
@endphp
<input type="hidden" name="type" value="{{ isset($item) ? $item->type : request('type') }}">
<input type="hidden" name="loc" value="{{ isset($item) ? $item->locale : request('locale', 'en') }}">
{{--{{ dd(\UrlAliasLocalization::getSupportedLocales()) }}--}}
@include('admin.fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($item) ? $item->publish : 1,
])

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Название', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
@if(in_array(request('type') ?? $item->type, ['slides']))
    <div class="form-group {{ $errors->has('data.text') ? 'has-error' : ''}}">
        {!! Form::label('data[text]', 'Текст', ['class' => 'control-label']) !!}
        {!! Form::textarea('data[text]', null, ['class' => 'form-control ck-editor ck-small', 'required', 'rows' => 2]) !!}
        {!! $errors->first('data.text', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if(in_array(request('type') ?? $item->type, ['activities']))
    <div class="form-group {{ $errors->has('data.text') ? 'has-error' : ''}}">
        {!! Form::label('data[text]', 'Текст', ['class' => 'control-label']) !!}
        {!! Form::textarea('data[text]', null, ['class' => 'form-control', 'required', 'rows' => 2]) !!}
        {!! $errors->first('data.text', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if(in_array(request('type') ?? $item->type, ['slides']))
    <div class="form-group {{ $errors->has('data.phone') ? 'has-error' : ''}}">
        {!! Form::label('data[phone]', 'Телефоны', ['class' => 'control-label']) !!}
        {!! Form::textarea('data[phone]', null, ['class' => 'form-control', 'required', 'rows' => 2]) !!}
        {!! $errors->first('data.phone', '<p class="help-block">:message</p>') !!}
    </div>
@endif
@if(in_array(request('type') ?? $item->type, ['activities', 'slides']))
    @include('admin.fields.field-image-uploaded',[
        'label' => 'Изображение',
        'field_name' => 'image',
        'entity' => isset($item) ? $item : null,
    ])
@endif

@if(in_array(request('type') ?? $item->type, ['contacts']))
    @include('admin.fields.field-field-list-items', [
      'label' => 'Адресса',
      'field_name' => 'data[address]',
      'placeholder_value' => 'Значение',
      'items' => (isset($item) && isset($item->data['address'])) ? $item->data['address'] : [],
   ])
   {{-- @include('admin.fields.field-field-list-items', [
      'label' => 'Телефоны',
      'field_name' => 'data[phones]',
      'placeholder_value' => 'Значение',
      'items' => (isset($item) && isset($item->data['phones'])) ? $item->data['phones'] : [],
   ])
    @include('admin.fields.field-field-list-items', [
     'label' => 'Email',
     'field_name' => 'data[emails]',
     'placeholder_value' => 'Значение',
     'items' => (isset($item) && isset($item->data['emails'])) ? $item->data['emails'] : [],
  ])--}}
    @include('admin.fields.field-select2-static', [
        'label' => 'Контактные личности ',
        'field_name' => 'persons[]',
        'multiple' => 1,
        //'max' => 1,
        'disabled' => 0,
        'required' => 0,
        'attributes' => App\Models\Person::getItemsArray($locale, isset($item) ? $item->id : null),
        'selected' => isset($item) ? $item->persons->pluck('id')->toArray() : [],
        'empty_value' => '--не указано--',
    ])
    <div class="form-group {{ $errors->has('data.latitude') ? 'has-error' : ''}}">
        {!! Form::label('data[latitude]', 'Широта', ['class' => 'control-label']) !!}
        {!! Form::text('data[latitude]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('data.latitude', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('data.longitude') ? 'has-error' : ''}}">
        {!! Form::label('data[longitude]', 'Долгота', ['class' => 'control-label']) !!}
        {!! Form::text('data[longitude]', null, ['class' => 'form-control']) !!}
        {!! $errors->first('data.longitude', '<p class="help-block">:message</p>') !!}
    </div>
    @include('admin.fields.field-image-uploaded',[
        'label' => 'Фото оффиса',
        'field_name' => 'image',
        'entity' => isset($item) ? $item : null,
    ])
@endif

@include('admin.fields.field-form-buttons', [
    'url_store_and_create' => route('admin.items.create'),
    'url_store_and_close' => session('admin.items.index'),
    'url_destroy' => isset($item) ? route('admin.items.destroy', $item) : '',
    'url_after_destroy' => session('admin.items.index'),
    'url_close' => session('admin.items.index'),
])

@push('scripts')
    <script>
        if ($('.field-list-items').length) {
            $('.field-list-items').on('click', '.btn-info', function (e) {
                e.preventDefault()
                var n = $(this).parents('.field-list-items').find('.btn-info').index(this),
                    length = $(this).parents('.field-list-items').find('.btn-info').length,
                    fieldName = $(this).parents('.field-list-items').data('field-name'),
                    placeholderValue = $(this).parents('.field-list-items').data('placeholder-value'),
                    item = '<tr class="item">'
                        + '<td>'
                        + '<div class="input-group input-group-md">'
                        + '<span class="input-group-btn" style="width: 40%">'
                        + '<input type="text" name="' + fieldName + '[' + (length) + ']" class="form-control" placeholder="' + placeholderValue +' '+ (parseInt(length) + 1) + '">'
                        + '</span>'
                        + '<span class="input-group-btn">'
                        + '<button type="button" class="btn btn-info btn-flat">'
                        + '<i class="fa fa-plus"></i>'
                        + '</button>'
                        + '<button type="button" class="btn btn-danger btn-flat">'
                        + '<i class="fa fa-remove"></i>'
                        + '</button>'
                        + '</span>'
                        + '</div>'
                        + '</td>'
                        + '</tr>"'
                $(this).parents('.field-list-items').find('.item').eq(n).after(item)
            })

            $('.field-list-items').on('click', '.btn-danger', function (e) {
                e.preventDefault()
                var n = $(this).parents('.field-list-items').find('.btn-danger:not(.first)').index(this)

                $(this).parents('.field-list-items').find('.item').eq(n).remove()
            })
        }
    </script>
@endpush

