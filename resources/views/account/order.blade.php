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
    <style>
        .order-card {
            border-radius: 8px;
            background-color: #efefef;
            padding: 30px;
        }
    </style>
    <div class="container">
        <div class="order-card">
            <div class="row">
                <h5>Заказ</h5>
                <p>чета чета</p>
                <p>чета: <span class="font-weight-bold">24</span></p>
            </div>
            <div class="row">
                <button class="btn btn--box btn--small btn--uppercase btn--blue">
                    Назад
                </button>
                <button class="btn btn--box btn--small btn--uppercase btn--blue m-l-20">
                    Назад
                </button>
            </div>
        </div>
    </div>
@endsection
