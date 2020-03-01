@extends('admin.auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">{!! config('app.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Восстановление пароля</p>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="Email">
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
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Восстановить</button>
                    </div>
                </div>
            </form>

            @include('admin.auth.social-links')

            <a href="{{ route('register') }}" class="text-center">Зарегистрироваться</a>

        </div>
    </div>
</body>
@endsection
