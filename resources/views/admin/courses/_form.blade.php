<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Назва курсу', ['class' => 'control-label']) !!}
    {!! Form::text('name', isset($course) ? $course->name : null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

@include('admin.fields.field-field-list-items', [
   'label' => 'Предмети',
   'field_name' => 'subjects',
   'placeholder_value' => 'Значення',
   'items' => isset($course) ? $course->subjects->pluck('name', 'id')->toArray() : [],
])

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
    'url_store_and_create' => route('admin.courses.store'),
    //'url_store_and_close' => session('admin.blocks.index'),
    //'url_destroy' => isset($block) ? route('admin.blocks.destroy', $block) : '',
    //'url_after_destroy' => session('admin.blocks.index'),
    //'url_close' => session('admin.blocks.index'),
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
