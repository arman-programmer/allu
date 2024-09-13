@extends('common/layout')
@section('title')
    Мой аккаунт
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'account', 'title' => 'Личный кабинет'],
    ]
    ])
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <!-- :::::::::: Start My Account Section :::::::::: -->
            <div class="my-account-area">
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <div class="my-account-menu">
                            <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
                                <li>
                                    <a class="active link--icon-left my-account-list" id="pills-dashboard-tab"
                                       data-toggle="pill"
                                       href="#pills-dashboard" role="tab" aria-controls="pills-dashboard"
                                       aria-selected="true"><i class="fas fa-tachometer-alt"></i> Панель управления</a>
                                </li>
                                <li>
                                    <a id="pills-order-tab" class="link--icon-left my-account-list" data-toggle="pill"
                                       href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false"><i
                                            class="fas fa-shopping-cart"></i> История заказов</a>
                                </li>
                                <li>
                                    <a id="pills-payment-tab" class="link--icon-left my-account-list" data-toggle="pill"
                                       href="#pills-payment" role="tab" aria-controls="pills-payment"
                                       aria-selected="false"><i class="fas fa-credit-card"></i> Способ оплаты</a>
                                </li>
                                <li>
                                    <a id="pills-address-tab" class="link--icon-left my-account-list" data-toggle="pill"
                                       href="#pills-address" role="tab" aria-controls="pills-address"
                                       aria-selected="false"><i class="fas fa-map-marker-alt"></i> Адреса доставки</a>
                                </li>
                                <li>
                                    <a id="pills-account-tab" class="link--icon-left my-account-list" data-toggle="pill"
                                       href="#pills-account" role="tab" aria-controls="pills-account"
                                       aria-selected="false"><i class="fas fa-user"></i>
                                        Настройки аккаунта</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="link--icon-left my-account-list m-b-20">
                                            <i class="fas fa-sign-out-alt"></i>
                                            Выйти
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-8">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="tab-content my-account-tab" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                 aria-labelledby="pills-dashboard-tab">
                                <div class="my-account-dashboard account-wrapper">
                                    <h4 class="account-title">Панель управления</h4>
                                    <div class="welcome-dashboard m-t-30">
                                        @if(Auth::user()->name)
                                            <p>Здраствуйте, {{ Auth::user()->name }}!</p>
                                        @endif
                                        <p>Ваш номер телефона: +7{{ Auth::user()->phone }}</p>
                                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                                            @csrf
                                            <p>
                                                Если это не ваш номер:
                                                <button class="title--blue" type="submit">Выйти</button>
                                            </p>
                                        </form>
                                    </div>
                                    <p>из панели управления вашей учетной записи вы можете легко
                                        проверять и просматривать свои
                                        <a href="#">недавние заказы</a>, управлять
                                        <a href="#">адресами доставки</a>, а также изменять свой
                                        <a href="#">пароль</a> и
                                        <a href="#">почту</a>
                                        <a href="#">данные</a> учетной записи.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-order" role="tabpanel"
                                 aria-labelledby="pills-order-tab">
                                <div class="my-account-order account-wrapper">
                                    <h4 class="account-title">Заказы</h4>
                                    <div class="account-table text-center m-t-30 table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="no">№</th>
                                                <th class="date">Дата</th>
                                                <th class="status">Статус</th>
                                                <th class="total">Сумма</th>
                                                <th class="action">Детали</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $loop -> iteration }}</td>
                                                    @php
                                                        $datetime = new DateTime($order -> created_at);
                                                        $formattedDate = $datetime->format('d.m.y\г H:i');
                                                    @endphp
                                                    <td>{{ $formattedDate }}</td>
                                                    <td>{{ $order -> status }}</td>
                                                    <td>{{ $order -> orderProducts }}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal">Показать</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                 aria-labelledby="pills-payment-tab">
                                <div class="my-account-payment account-wrapper">
                                    <h4 class="account-title">Способ оплаты</h4>
                                    <p class="m-t-30">Вы еще не можете сохранить свой способ оплаты.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-address" role="tabpanel"
                                 aria-labelledby="pills-address-tab">
                                <div class="my-account-order account-wrapper">
                                    <h4 class="account-title">Ваши адреса</h4>
                                    <div class="account-table m-t-30 table-responsive">
                                        @if(!$addresses->isEmpty())
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="no">№</th>
                                                    <th class="date">Адрес</th>
                                                    <th class="action"></th>
                                                    <th class="action"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($addresses as $address)
                                                    <tr>
                                                        <td>{{ $loop-> iteration}}</td>
                                                        <td>{{ $address->name }}</td>
                                                        <td>
                                                            <a href="#"><i class="fa fa-pen"></i></a>
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('account.address.delete', ['id' => $address -> id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"><i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p>У вас пока нет сохраненных адресов</p>
                                        @endif
                                        <button class="btn btn--box btn--small btn--uppercase btn--blue">
                                            Создать новый
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-account" role="tabpanel"
                                 aria-labelledby="pills-account-tab">
                                <div class="my-account-details account-wrapper">
                                    <h4 class="account-title">Настройки аккаунта</h4>
                                    <div class="account-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-box__single-group">
                                                    <label>Ваш номер телефона</label>
                                                    <input class="form-control" value="+7{{ Auth::user()->phone }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box__single-group">
                                                    <label>Ваше имя</label>
                                                    <form action="{{ route('account.edit') }}" method="post" id="edit">
                                                        @csrf
                                                        @if(Auth::user()->name)
                                                            <input name="name" class="form-control" type="text"
                                                                   placeholder="Ваше имя.."
                                                                   value="{{ Auth::user()->name }}">
                                                        @else
                                                            <input name="name" class="form-control" type="text"
                                                                   placeholder="Ваше имя..">
                                                        @endif
                                                    </form>
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger m-t-30">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-box__single-group">
                                                    <button type="submit"
                                                            form="edit"
                                                            class="btn btn--box btn--small btn--uppercase btn--blue">
                                                        Сохранить изменения
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- :::::::::: End My Account Section :::::::::: -->
        </div>
    </div>
@endsection
