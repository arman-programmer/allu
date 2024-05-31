@if (!$recommendations->isEmpty())
    <!-- ::::::  Start  Product Style - Default Section  ::::::  -->
    <div class="col-12">
        <div class="product product--1 swiper-outside-arrow-hover">
            <div class="row">
                <div class="col-12">
                    <h5 class="section-content__title">Возможно Вас также заинтересуют…</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-outside-arrow-fix pos-relative">
                        <div class="product-default-slider-5grid overflow-hidden m-t-50">
                            <div class="swiper-wrapper">
                                @foreach ($recommendations as $recommendation)
                                    <!-- Start Single Default Product -->
                                    <div
                                        class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                        <div class="product__img-box">
                                            <a href="{{ route('product', $recommendation->id) }}"
                                               class="product__img--link">
                                                @if($recommendation -> images->isNotEmpty())
                                                    @foreach($recommendation -> images as $image)
                                                        @if($recommendation->thumb == $image->count)
                                                            <img class="product__img" src="{{ $image->link }}"
                                                                 alt="{{ $recommendation->name }}">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img class="product__img"
                                                         src="{{ asset('assets/placeholder.svg') }}"
                                                         alt="{{ $recommendation->name }}">
                                                @endif
                                            </a>
                                            <form
                                                action="{{ route('addToCart', ['product_id' => $product->id, 'quantity' => 1]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                    в корзину
                                                </button>
                                            </form>
                                        </div>
                                        <div class="product__price m-t-10">
                                            <span class="product__price-reg">{{ $recommendation->price }}</span>
                                        </div>
                                        <a href="{{ route('product', $recommendation->id) }}"
                                           class="product__link product__link--underline product__link--weight-light">
                                            {{ $recommendation->name }}
                                        </a>
                                    </div> <!-- End Single Default Product -->
                                @endforeach
                            </div>
                            <div class="swiper-buttons">
                                <!-- Add Arrows -->
                                <div class="swiper-button-next default__nav default__nav--next"><i
                                        class="fal fa-chevron-right"></i></div>
                                <div class="swiper-button-prev default__nav default__nav--prev"><i
                                        class="fal fa-chevron-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ::::::  End  Product Style - Default Section  ::::::  -->
@endif
