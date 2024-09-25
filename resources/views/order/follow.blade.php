@extends('common.layout')
@section('title')
    Оформление заказа
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'cart', 'title' => 'Корзина'],
    ['title' => 'Заказ оформлен'],
    ]
    ])
@endsection

@section('main_content')
    <form action="{{ route('checkout.create') }}" method="post" class="form-box">
        @csrf
        <div class="row">
            <!-- Start Order Wrapper -->
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
                                        <span
                                            class="your-order-middle-left">{{ $product->product_id }}</span>
                                        <span class="your-order-middle-right">{{ $product->price }} тг</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="your-order-bottom d-flex justify-content-between">
                                <h6 class="your-order-bottom-left">{{ $order -> id }}</h6>
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
                <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight m-t-30" type="submit">
                    Подтвердить заказ!
                </button>
            </div> <!-- End Order Wrapper -->
        </div>
    </form>
@endsection
