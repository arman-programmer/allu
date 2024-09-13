<!-- ::::::  Start Popup Add Cart ::::::  -->
<div id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
    @if ($products != null)
        <div class="offcanvas-add-cart__top m-b-40">
            <span class="offcanvas-add-cart__top-text"><i class="icon-shopping-cart"></i> Товары в корзине: {{ count($products) }}</span>
            <button class="offcanvas-close">&times;</button>
        </div>
        <!-- Start Add Cart Item Box-->
        <ul class="offcanvas-add-cart__menu">
            @foreach ($products as $product)
                <!-- Start Single Add Cart Item-->
                <li class="offcanvas-add-cart__list pos-relative">
                    <div class="offcanvas-add-cart__img-box pos-relative">
                        <a href="{{ route('product', $product->id) }}"
                           class="offcanvas-add-cart__img-link img-responsive">
                            @if($product->images->isNotEmpty() && $product->images->first())
                                <img class="img-fluid"
                                     src="{{ $product->images->first()->link }}" alt="">
                            @else
                                <img class="img-fluid"
                                     src="{{ asset('assets/placeholder.svg') }}" alt="">
                            @endif
                        </a>
                        <span class="offcanvas-add-cart__item-count pos-absolute">{{ $product->quantity }} x</span>
                    </div>
                    <div class="offcanvas-add-cart__detail">
                        <a href="{{ route('product', $product->id) }}"
                           class="offcanvas-add-cart__link">{{ $product->name }}</a>
                        <span class="offcanvas-add-cart__price">{{ $product->price }} тг</span>
                    </div>
                    <form action="{{ route('cart.remove', ['product_id' => $product['id']]) }}" method="post">
                        @csrf
                        <button type="submit" class="offcanvas-add-cart__item-dismiss pos-absolute">&times;</button>
                    </form>
                </li> <!-- End Single Add Cart Item-->
            @endforeach
        </ul> <!-- End Add Cart Item Box-->
        <!-- Start Add Cart Checkout Box-->
        <div class="offcanvas-add-cart__checkout-box-bottom">
            <!-- Start offcanvas Add Cart Checkout Info-->
            <ul class="offcanvas-add-cart__checkout-info">
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Доставка</span>
                    <span class="offcanvas-add-cart__checkout-right-info">0 тг</span>
                </li> <!-- End Single Add Cart Checkout Info-->
                <!-- Start Single Add Cart Checkout Info-->
                <li class="offcanvas-add-cart__checkout-list">
                    <span class="offcanvas-add-cart__checkout-left-info">Общая сумма:</span>
                    <span class="offcanvas-add-cart__checkout-right-info">{{ $total }} тг</span>
                </li> <!-- End Single Add Cart Checkout Info-->
            </ul> <!-- End offcanvas Add Cart Checkout Info-->
            <div class="offcanvas-add-cart__btn-checkout">
                <a href="{{ route('cart.clear') }}"
                   class="btn btn--block btn--box btn--gray btn--large btn--uppercase btn--weight m-b-20">Очистить
                    корзину</a>
                <a href="{{ route('cart') }}"
                   class="btn btn--block btn--box btn--gray btn--large btn--uppercase btn--weight m-b-20">Перейти в
                    корзину</a>
                <a href="{{ route('checkout') }}"
                   class="btn btn--block btn--box btn--blue btn--large btn--uppercase btn--weight">Оформить
                    заказ!</a>
            </div>
        </div> <!-- End Add Cart Checkout Box-->
    @else
        <div class="offcanvas-add-cart__top m-b-40">
                <span class="offcanvas-add-cart__top-text"><i
                        class="icon-shopping-cart"></i> Ваша корзина пуста :(</span>
            <button class="offcanvas-close">&times;</button>
        </div>
        <div class="offcanvas-add-cart__checkout-box-bottom">
            <img class="offcanvas-add-cart__img" src="{{ asset('assets/img/empty_cart.png') }}" alt="">
            <hr>
            <div class="offcanvas-add-cart__btn-checkout">
                <button class="offcanvas-close btn btn--block btn--box btn--gray btn--large btn--uppercase">
                    Продолжить покупки
                </button>
            </div>
        </div>
    @endif
</div> <!-- :::::: End Popup Add Cart :::::: -->
