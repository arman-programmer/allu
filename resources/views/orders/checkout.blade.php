@extends('common.layout')
@section('title')
    Оформление заказа
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'cart', 'title' => 'Корзина'],
    ['route' => 'checkout', 'title' => 'Оформление заказа'],
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
                                        <span class="your-order-middle-left">
                                            <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
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
                                <h5 class="your-order-total-right">{{ $total }} тг</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Order Wrapper -->
            <!-- Start Client Shipping Address -->
            <div class="col-lg-6">
                <div class="section-content">
                    <h5 class="section-content__title">Оплата и доставка</h5>
                </div>
                <div class="form-box__single-group">
                    <label for="form-phone">Номер телефона</label>
                    @if (!Auth::check())
                        <input type="phone" name="phone" id="phone" class="form-control tel"
                               placeholder="+7(777)777-77-77"
                               minlength="17">
                    @else
                        <input type="phone" class="form-control"
                               placeholder="+7{{ Auth::user()->phone }}" disabled>
                        <input type="hidden" name="phone" value="+7{{ Auth::user()->phone }}">
                    @endif
                </div>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-box__single-group">
                    <label for="form-address-1">Адрес:</label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ $current_city }}
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start"
                             style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                            @foreach($cities as $city)
                                <a class="dropdown-item">{{ $city }}</a>
                            @endforeach
                        </div>
                    </div>
                    <input name="address" type="address" class="form-control" list="list-addresses"
                           id="input-datalist"
                           placeholder="Улица, дом, номер квартиры" value="{{ old('address') }}">
                    <datalist id="list-addresses">
                        <option>Asia/Aden</option>
                        <option>Asia/Aqtau</option>
                        <option>Asia/Baghdad</option>
                        <option>Asia/Barnaul</option>
                        <option>Asia/Chita</option>
                        <option>Asia/Dhaka</option>
                        <option>Asia/Famagusta</option>
                        <option>Asia/Hong_Kong</option>
                        <option>Asia/Jayapura</option>
                        <option>Asia/Kuala_Lumpur</option>
                        <option>Asia/Jakarta</option>
                    </datalist>
                </div>
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-box__single-group">
                    <label>Примечание к заказу</label>
                    <textarea name="comment" id="form-additional-info" rows="5"
                              placeholder="Пожелания или дополнения к заказу (необязательно)">{{ old('comment') }}</textarea>
                </div>
                <div class="m-tb-20">
                    <label>
                        <input name="rules" type="checkbox" class="check-rules"
                               id="check-rules">
                        <span>Я прочитал <a href="{{ route('terms') }} ">Правила и условия</a> и согласен с ними</span>
                    </label>
                    @error('rules')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight m-t-30" type="submit">
                    Подтвердить заказ!
                </button>
            </div> <!-- End Client Shipping Address -->
        </div>
    </form>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', e => {
        $('#input-datalist').autocomplete()
    }, false);
</script>
