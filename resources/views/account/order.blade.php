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
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="contact-info-wrap gray-bg">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="section-content__title">Заказ</h5>
                        </div>
                        <div class="col-6">
                            <p>чета чета</p>
                            <p>чета: <span class="font-weight-bold">24</span></p>
                        </div>
                        <div class="col-12">
                            <button class="btn btn--box btn--small btn--uppercase btn--blue">
                                Назад
                            </button>
                            <button class="btn btn--box btn--small btn--uppercase btn--blue m-l-20">
                                Назад
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
