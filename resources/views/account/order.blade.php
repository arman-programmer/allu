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
    <div class="container-fluid d-sm-flex justify-content-center">
        <div class="card px-2">
            <div class="card-header bg-white">
                <div class="row justify-content-between">
                    <div class="col">
                        <p class="text-muted"> Номер заказа:
                            <span class="font-weight-bold text-dark">{{ $order->id }}</span>
                        </p>
                        @php
                            $datetime = new DateTime($order -> created_at);
                            $formattedDate = $datetime->format('d.m.y\г H:i');
                        @endphp
                        <p class="text-muted"> Время заказа:
                            <span class="font-weight-bold text-dark">{{ $formattedDate }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="media flex-column flex-sm-row">
                    <div class="media-body ">
                        <h5 class="bold">Blade High Heels Sandals</h5>
                        <p class="text-muted"> Qt: 1 Pair</p>
                        <h4 class="mt-3 mb-4 bold">1,500 тг</h4>
                        <p class="text-muted">Tracking Status on: <span class="Today">11:30pm, Today</span></p>
                        <button type="button" class="btn  btn-outline-primary d-flex">К товару</button>
                    </div>
                    <img class="align-self-center img-fluid" src="https://i.imgur.com/bOcHdBa.jpg" width="180 "
                         height="180">
                </div>
            </div>
            <div class="card-body">
                <div class="media flex-column flex-sm-row">
                    <div class="media-body ">
                        <h5 class="bold">Blade High Heels Sandals</h5>
                        <p class="text-muted"> Qt: 1 Pair</p>
                        <h4 class="mt-3 mb-4 bold">1,500 тг</h4>
                        <p class="text-muted">Tracking Status on: <span class="Today">11:30pm, Today</span></p>
                        <button type="button" class="btn  btn-outline-primary d-flex">К товару</button>
                    </div>
                    <img class="align-self-center img-fluid" src="https://i.imgur.com/bOcHdBa.jpg" width="180 "
                         height="180">
                </div>
            </div>
            <div class="card-body">
                <div class="media flex-column flex-sm-row">
                    <div class="media-body ">
                        <h5 class="bold">Blade High Heels Sandals</h5>
                        <p class="text-muted"> Qt: 1 Pair</p>
                        <h4 class="mt-3 mb-4 bold">1,500 тг</h4>
                        <p class="text-muted">Tracking Status on: <span class="Today">11:30pm, Today</span></p>
                        <button type="button" class="btn  btn-outline-primary d-flex">К товару</button>
                    </div>
                    <img class="align-self-center img-fluid" src="https://i.imgur.com/bOcHdBa.jpg" width="180 "
                         height="180">
                </div>
            </div>
            <div class="row px-3">
                <div class="col">
                    <ul id="progressbar">
                        <li class="step0 active " id="step1">PLACED</li>
                        <li class="step0 active text-center" id="step2">SHIPPED</li>
                        <li class="step0  text-muted text-right" id="step3">DELIVERED</li>
                        <li class="step0  text-muted text-right" id="step4">DELIVERED</li>
                        <li class="step0  text-muted text-right" id="step5">DELIVERED</li>
                    </ul>
                </div>
            </div>
            <div class="card-footer  bg-white px-sm-3 pt-sm-4 px-0">
                <div class="row text-center  ">
                    <div class="col my-auto  border-line "><a>Назад</a></div>
                    <div class="col  my-auto  border-line "><a>Отменить</a></div>
                    <div class="col my-auto   border-line "><a>Отслеживать</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
