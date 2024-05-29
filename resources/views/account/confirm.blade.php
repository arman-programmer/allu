@extends('common.layout')
@section('title')
    Войти
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'login', 'title' => 'Авторизоваться'],
    ['route' => 'confirm', 'title' => 'Подтверждение телефона'],
    ]
    ])
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12 col-md-6 ml-auto mr-auto">
            <div class="login-form-container">
                <h5 class="account-title">{{ $text }}</h5>
                <form action="{{ route('confirm') }}" method="post">
                    @csrf
                    <div class="form-box__single-group">
                        <label for="phone">Введите код из SMS: +7{{ $phone }}</label>
                        <input type="code" name="code" class="code form-box__single-group_input" placeholder="XXXX"
                               autocomplete="off" maxlength="4">
                        @if ($errors->any())
                            <div class="alert alert-danger m-t-20">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <a id="resend">Отправить код повторно<span id="timer"></span></a>
                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-10"
                                type="submit">Подтвердить
                        </button>
                        <a href="{{ route('confirm.cancel') }}"
                           class="btn btn--box btn--small btn--gray btn--uppercase btn--weight m-t-10"
                           type="submit">Отмена
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            var duration = (60 * 3) - {{ $time }};
            var display = document.getElementById("timer");
            var timer = duration, minutes, seconds;
            var timerId;
            var link = document.getElementById("resend");

            function updateTimer() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = ": " + minutes + ":" + seconds;

                if (--timer < 0) {
                    link.setAttribute("href", "{{ route('confirm.resend') }}");
                    display.textContent = "";
                    clearTimeout(timerId);
                }
            }

            updateTimer();

            timerId = setInterval(updateTimer, 1000);
        };
    </script>
@endsection
