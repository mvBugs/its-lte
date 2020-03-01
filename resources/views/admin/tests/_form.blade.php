{{--@include('admin.fields.field-select2-static', [
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
@include('admin.fields.field-select2-static', [
    'label' => 'Предмет',
    'field_name' => 'subject',
    'multiple' => 0,
    'max' => 1,
    'disabled' => 0,
    'required' => 1,
    'attributes' => /*[1 => 'Новый заказ', 2 => 'В обработке'],*/ \App\Models\Subject::all()->pluck('name', 'id')->toArray(),
    'selected' => /*isset($product) ? $product->values->pluck('id')->toArray() :*/ [],
    'empty_value' => '--не указано--',
])--}}
@php
    $courses = \App\Models\Course::with('subjects')->get();
@endphp
<div id="app">
    <select-component
        :items="{{ $courses }}"
        :route="{{ json_encode(route('admin.tests.store'))   }}"
    ></select-component>
</div>

@include('admin.fields.field-files-uploaded',[
     'label' => 'Файли',
     'field_name' => 'files',
     'entity' => null,
])

@include('admin.fields.field-form-buttons', [
    'url_store_and_create' => route('admin.courses.store'),
    //'url_store_and_close' => session('admin.blocks.index'),
    //'url_destroy' => isset($block) ? route('admin.blocks.destroy', $block) : '',
    //'url_after_destroy' => session('admin.blocks.index'),
    //'url_close' => session('admin.blocks.index'),
])

