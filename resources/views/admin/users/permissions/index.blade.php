@extends('admin.layouts.app')

@php
    $content_header = [
        'page_title' => 'Роли и права пользователей',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => '',
    ]
@endphp

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Управление правами</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Права / Роли</th>
                            @foreach($roles as $role)
                                <th class="text-center">{{ $role->title }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->title ?? $permission->name }}</td>
                                @foreach($roles as $role)
                                    <td class="text-center">
                                        <input type="checkbox" class="role-permission" @if($role->name == 'admin') disabled @endif data-url="{{ route('admin.permission.role') }}" data-role="{{ $role->name }}" data-permission="{{ $permission->name }}" data-guard="{{ $permission->guard_name }}" {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- TODO: move to JS file --}}
@push('scripts')
    //------------------ РОЛИ,ПРАВА ПОЛЬЗОВЕТЕЛЕЙ--------------------------//
    <script>
        $('.role-permission').on('change', function(e) {
            let $this = $(this),
                checked = this.checked ? 1 : 0,
                role = $this.data('role'),
                permission = $this.data('permission'),
                url = $this.data('url')
            $.ajax({
                url: url,
                method: 'POST',
                data : {'checked': checked, 'role': role, 'permission': permission},
                success: function (data, textStatus) {
                    toastr.success(data.message)
                },
                error: function () {
                    $this.prop('checked', checked ? 0 : 1);
                    alert('Ошибка сохранения!')
                }
            });
        });
    </script>
@endpush