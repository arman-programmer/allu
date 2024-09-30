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
        <div class="col-lg-6">
            <div class="section-content">
                <h5 class="section-content__title">Оплата и доставка</h5>
            </div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Order Placed<span>09 Aug 2025, 10:00am</span></div>
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Order Confirmed<span>09 Aug 2025, 10:30am</span></div>
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Packed the product<span>09 Aug 2025, 12:00pm</span>
                                    </div>
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Arrived in the
                                        warehouse<span>10 Aug 2025, 02:00pm</span></div>
                                </div>
                                <div class="tracking-item">
                                    <div class="tracking-icon status-current blinker">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                             data-prefix="fas" data-icon="circle" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Near by Courier
                                        facility<span>10 Aug 2025, 03:00pm</span></div>
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Out for Delivery<span>12 Aug 2025, 05:00pm</span>
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
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed"/></div>
                                    <div class="tracking-content">Delivered<span>12 Aug 2025, 09:00pm</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="your-order-section">
                <div class="section-content">
                    <h5 class="section-content__title">Ваш заказ</h5>
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
