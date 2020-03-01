@extends('admin.auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">{!! config('app.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Регистрация</p>
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="form-group @error('name') has-error @enderror has-feedback">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus placeholder="Имя">
                    @error('name')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group @error('password') has-error @enderror has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Пароль">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group @error('password_confirmation') has-error @enderror has-feedback">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autocomplete="new-password" placeholder="Подтверждение пароля">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @error('password_confirmation')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xs-7">
                        <label>
                            <input type="hidden" name="accept" value="0">
                            <input type="checkbox" name="accept" {{ old('accept') ? 'checked' : '' }} value="1"> Я согласен с <a
                                    href="#">политикой</a>
                        </label>
                    </div>
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Регистрация</button>
                    </div>
                </div>
            </form>

            @include('admin.auth.social-links')

            <a href="{{ route('login') }}">Войти в систему</a><br>
            <a href="{{ route('password.request') }}">Восстановить пароль</a><br>

        </div>
    </div>
</body>
@endsection
