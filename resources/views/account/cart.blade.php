@extends('common/layout')
@section('title')
    Корзина
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'cart', 'title' => 'Ваша корзина'],
    ]
    ])
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="section-content">
                <h5 class="section-content__title">Ваши товары в корзине</h5>
            </div>
            <!-- Start Cart Table -->
            <div class="table-content table-responsive cart-table-content m-t-30">
                <table>
                    <thead class="gray-bg">
                    <tr>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="product-thumbnail">

                                <a href="{{ route('product', ['id' => $product['id']]) }}">
                                    @if($product -> images->isNotEmpty())
                                        @foreach($product -> images as $image)
                                            @if($product->thumb == $image->count)
                                                <img class="img-fluid" src="{{ $image->link }}" alt="">
                                            @endif
                                        @endforeach
                                    @else
                                        <img class="product__img" src="{{ asset('assets/placeholder.svg') }}"
                                             alt="">
                                    @endif
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('product', ['id' => $product['id']]) }}">{{ $product['name'] }}</a>
                            </td>
                            <td class="product-price-cart"><span class="amount">{{ $product['price'] }} тг</span></td>
                            <td class="product-quantities">
                                <div class="quantity d-inline-block">
                                    <input type="number" name="cart_items[{{ $product['id'] }}]" min="1" step="1"
                                           value="{{ $product['quantity'] }}" class="quantity-input"
                                           data-product-id="{{ $product['id'] }}"
                                           data-product-price="{{ $product['price'] }}">
                                </div>
                            </td>
                            <td class="product-subtotal"
                                id="subtotal-{{ $product['id'] }}">{{ $product['price'] * $product['quantity'] }} тг
                            </td>
                            <td class="product-remove">
                                <form action="{{ route('removeFromCart', ['product_id' => $product['id']]) }}"
                                      method="post">
                                    @csrf
                                    <button type="submit"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- End Cart Table -->
            <!-- Start Cart Table Button -->
            <div class="cart-table-button m-t-10">
                <div class="cart-table-button--left">
                    @if(!empty(url()->previous() && url()->previous() != url()->current()))
                        <a href="{{ url()->previous() }}"
                           class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">
                            Продолжить покупки
                        </a>
                    @else
                        <a href="{{ route('home') }}"
                           class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">
                            Продолжить покупки
                        </a>
                    @endif
                </div>
                <div class="cart-table-button--right">
                    <a href="{{ route('clearCart') }}"
                       class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">
                        Очистить корзину
                    </a>
                </div>
            </div> <!-- End Cart Table Button -->
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="sidebar__widget gray-bg m-t-40">
                <div class="sidebar__box">
                    <h5 class="sidebar__title">Итоговая сумма</h5>
                </div>
                <div class="total-shipping">
                    <h6 class="total-cost">Итого: <span id="grand-total">{{ $total }} тг</span></h6>
                </div>
                <div class="total-shipping">
                    <span>Доставка</span>
                    <ul class="shipping-cost m-t-10">
                        <li>
                            <label for="ship-standard">
                                <input type="radio" class="shipping-select" name="shipping-cost" value="Standard"
                                       id="ship-standard" checked><span>Бесплатная</span>
                            </label>
                            <span class="ship-price">0 тг</span>
                        </li>
                    </ul>
                </div>
                <div class="total-shipping">
                    <span>Оплата</span>
                    <ul class="shipping-cost m-t-10">
                        <li>
                            <label for="ship-standard">
                                <input type="radio" class="shipping-select" name="payment" value="Standard"
                                       id="ship-standard" checked><span>Наличными при получиении товара</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <h4 class="grand-total m-tb-25">Общая сумма: <span id="grand-total-1">{{ $total }} тг</span></h4>
                <a href="{{ route('checkout') }}" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight"
                   type="submit">Оформить заказ!</a>
            </div>
        </div>
        <!-- <div class="col-lg-4 col-md-6">
            <div class="sidebar__widget gray-bg m-t-40">
                <div class="sidebar__box">
                    <h5 class="sidebar__title">Есть промокод?</h5>
                </div>
                <span>Введите свой промокод сюда:</span>
                <form action="#" method="post" class="form-box">
                    <div class="form-box__single-group">
                        <label for="form-coupon">*Ввести промокод</label>
                        <input type="text" id="form-coupon">
                    </div>
                    <div class="from-box__buttons m-t-25">
                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Подтвердить</button>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.quantity-input').on('change', function () {
                var productId = $(this).data('product-id');
                var quantity = $(this).val();
                $.ajax({
                    url: "{{ route('update.cart') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#subtotal-' + productId).text(response.subtotal + ' тг');
                            $('#grand-total').text(response.total + ' тг');
                            $('#grand-total-1').text(response.total + ' тг');
                        } else {
                            console.log(response.text)
                        }

                    }
                });
            });
        });
    </script>

@endsection
