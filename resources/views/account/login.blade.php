@extends('common.layout')
@section('title')
    Авторизоваться
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'login', 'title' => 'Авторизоваться'],
    ]
    ])
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12 col-md-6 ml-auto mr-auto">
            <div class="login-form-container">
                <h4 class="account-title">Авторизация</h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-box__single-group">
                        <label for="phone">Введите номер телефона:</label>
                        <input type="phone" name="phone" id="phone" class="form-box__single-group_input"
                               placeholder="+7(777)777-77-77"
                               value="{{ old('phone') ?? ''}}" required>
                        @if ($errors->any())
                            <div class="alert alert-danger m-t-10">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="total-shipping">
                            <span>Способ подтврждения</span>
                            <ul class="shipping-cost m-t-10">
                                <li>
                                    <label for="ship-standard">
                                        <input type="radio" class="shipping-select" name="shipping-cost"
                                               value="Standard"
                                               id="ship-standard" checked>
                                        <span>SMS</span>
                                    </label>
                                    <span class="ship-price"><i class="fa fa-phone"></i></span>
                                </li>
                                <li>
                                    <label for="ship-standard">
                                        <input type="radio" class="shipping-select" name="shipping-cost"
                                               value="Standard"
                                               id="ship-standard" disabled>
                                        <span>WhatsApp</span>
                                    </label>
                                    <span class="ship-price"><i class="fab fa-whatsapp"></i></span>
                                </li>
                                <li>
                                    <label for="ship-standard">
                                        <input type="radio" class="shipping-select" name="shipping-cost"
                                               value="Standard"
                                               id="ship-standard" disabled>
                                        <span>Telegram</span>
                                    </label>
                                    <span class="ship-price"><i class="fab fa-telegram"></i></span>
                                </li>
                            </ul>
                        </div>

                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-10"
                                type="submit">Получить код
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
