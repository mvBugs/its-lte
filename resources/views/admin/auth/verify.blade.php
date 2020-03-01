@extends('admin.auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">{!! config('app.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Подтверждение</p>
            <p>Проверьте свой адрес электронной почты</p>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    На ваш адрес электронной почты отправлена новая ссылка для подтверждения.
                </div>
            @endif

            Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.
            Если вы не получили письмо, <a href="{{ route('verification.resend') }}"> нажмите здесь, чтобы запросить другой</a>.

        </div>
    </div>
</body>
@endsection
