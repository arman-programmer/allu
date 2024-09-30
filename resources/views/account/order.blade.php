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
        #tracking {
            background: #fff
        }

        .tracking-detail {
            padding: 3rem 0;
        }

        #tracking {
            margin-bottom: 1rem;
        }

        [class*="tracking-status-"] p {
            margin: 0;
            font-size: 1.1rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
        }

        [class*="tracking-status-"] {
            padding: 1.6rem 0;
        }

        .tracking-list {
            border: 1px solid #e5e5e5;
        }

        .tracking-item {
            border-left: 4px solid #00ba0d;
            position: relative;
            padding: 2rem 1.5rem 0.5rem 2.5rem;
            font-size: 0.9rem;
            margin-left: 3rem;
            min-height: 5rem;
        }

        .tracking-item:last-child {
            padding-bottom: 4rem;
        }

        .tracking-item .tracking-date {
            margin-bottom: 0.5rem;
        }

        .tracking-item .tracking-date span {
            color: #888;
            font-size: 85%;
            padding-left: 0.4rem;
        }

        .tracking-item .tracking-content {
            padding: 0.5rem 0.8rem;
            background-color: #f4f4f4;
            border-radius: 0.5rem;
        }

        .tracking-item .tracking-content span {
            display: block;
            color: #767676;
            font-size: 13px;
        }

        .tracking-item .tracking-icon {
            position: absolute;
            left: -0.7rem;
            width: 1.1rem;
            height: 1.1rem;
            text-align: center;
            border-radius: 50%;
            font-size: 1.1rem;
            background-color: #fff;
            color: #fff;
        }

        .tracking-item-pending {
            border-left: 4px solid #d6d6d6;
            position: relative;
            padding: 2rem 1.5rem 0.5rem 2.5rem;
            font-size: 0.9rem;
            margin-left: 3rem;
            min-height: 5rem;
        }

        .tracking-item-pending:last-child {
            padding-bottom: 4rem;
        }

        .tracking-item-pending .tracking-date {
            margin-bottom: 0.5rem;
        }

        .tracking-item-pending .tracking-date span {
            color: #888;
            font-size: 85%;
            padding-left: 0.4rem;
        }

        .tracking-item-pending .tracking-content {
            padding: 0.5rem 0.8rem;
            background-color: #f4f4f4;
            border-radius: 0.5rem;
        }

        .tracking-item-pending .tracking-content span {
            display: block;
            color: #767676;
            font-size: 13px;
        }

        .tracking-item-pending .tracking-icon {
            line-height: 2.6rem;
            position: absolute;
            left: -0.7rem;
            width: 1.1rem;
            height: 1.1rem;
            text-align: center;
            border-radius: 50%;
            font-size: 1.1rem;
            color: #d6d6d6;
        }

        .tracking-item-pending .tracking-content {
            font-weight: 600;
            font-size: 17px;
        }

        .tracking-item .tracking-icon.status-current {
            width: 1.9rem;
            height: 1.9rem;
            left: -1.1rem;
        }

        .tracking-item .tracking-icon.status-intransit {
            color: #00ba0d;
            font-size: 0.6rem;
        }

        .tracking-item .tracking-icon.status-current {
            color: #00ba0d;
            font-size: 0.6rem;
        }

        @media (min-width: 992px) {
            .tracking-item {
                margin-left: 10rem;
            }

            .tracking-item .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item .tracking-date span {
                display: block;
            }

            .tracking-item .tracking-content {
                padding: 0;
                background-color: transparent;
            }

            .tracking-item-pending {
                margin-left: 10rem;
            }

            .tracking-item-pending .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item-pending .tracking-date span {
                display: block;
            }

            .tracking-item-pending .tracking-content {
                padding: 0;
                background-color: transparent;
            }
        }

        .tracking-item .tracking-content {
            font-weight: 600;
            font-size: 17px;
        }

        .blinker {
            border: 7px solid #e9f8ea;
            animation: blink 1s;
            animation-iteration-count: infinite;
        }

        @keyframes blink {
            50% {
                border-color: #fff;
            }
        }
    </style>
    <div class="row">
        <div class="col-lg-6">
            <div class="section-content m-b-30">
                <h5 class="section-content__title">Заказ</h5>
            </div>
            <div id="tracking-pre"></div>
            <div id="tracking">
                <div class="tracking-list">
                    <div class="tracking-item">
                        <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                 data-prefix="fas" data-icon="circle" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                        </div>
                        <div class="tracking-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/>
                            </svg>
                        </div>
                        <div class="tracking-content">В обработке<span>09.09.2024, 10:00am</span></div>
                    </div>
                    <div class="tracking-item">
                        <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                 data-prefix="fas" data-icon="circle" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                        </div>
                        <div class="tracking-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/>
                            </svg>
                        </div>
                        <div class="tracking-content">В обработке<span>09.09.2024, 10:00am</span></div>
                    </div>
                    <div class="tracking-item">
                        <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                 data-prefix="fas" data-icon="circle" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                        </div>
                        <div class="tracking-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/>
                            </svg>
                        </div>
                        <div class="tracking-content">В обработке<span>09.09.2024, 10:00am</span></div>
                    </div>
                    <div class="tracking-item-pending">
                        <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                 data-prefix="fas" data-icon="circle" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                        </div>
                        <div class="tracking-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-map-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"/>
                                <path d="M9 4v13"/>
                                <path d="M15 7v5.5"/>
                                <path
                                    d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"/>
                                <path d="M19 18v.01"/>
                            </svg>
                        </div>
                        <div class="tracking-content">Доставлен<span>12.05.2025, 05:00</span>
                        </div>
                    </div>
                    <div class="tracking-item-pending">
                        <div class="tracking-icon status-intransit">
                            <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                 data-prefix="fas" data-icon="circle" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                            </svg>
                        </div>
                        <div class="tracking-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-map-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"/>
                                <path d="M9 4v13"/>
                                <path d="M15 7v5.5"/>
                                <path
                                    d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"/>
                                <path d="M19 18v.01"/>
                            </svg>
                        </div>
                        <div class="tracking-content">Доставлен<span>12.05.2025, 05:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="your-order-section">
                <div class="section-content">
                    <h5 class="section-content__title">Информация</h5>
                </div>
                <div class="your-order-box gray-bg m-t-30 m-b-30">
                    <div class="your-order-product-info">
                        <div class="your-order-top d-flex justify-content-between">
                            <h6 class="your-order-top-left">Товары</h6>
                            <h6 class="your-order-top-right">Цена</h6>
                        </div>
                        <ul class="your-order-middle">
                            @foreach ($products as $product)
                                <li class="d-flex justify-content-between">
                                        <span class="your-order-middle-left">
                                            <a href="#">{{$product->name}}</a>
                                        </span>
                                    <span class="your-order-middle-right">{{$product->price}} тг</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="your-order-bottom d-flex justify-content-between">
                            <h6 class="your-order-bottom-left">Доставка:</h6>
                            <span class="your-order-bottom-right">Бесплатная</span>
                        </div>
                        <div class="your-order-bottom d-flex justify-content-between m-t-20">
                            <h6 class="your-order-bottom-left">Оплата:</h6>
                            <span class="your-order-bottom-right">Наличными при получении товара</span>
                        </div>
                        <div class="your-order-total d-flex justify-content-between">
                            <h5 class="your-order-total-left">Общая сумма:</h5>
                            <h5 class="your-order-total-right"> тг</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
