@foreach ($products as $product)
    <!-- Start Single Default Product -->
    <div
        class="product__box product__box--default product__box--border-hover text-center float-left float-4">
        <div class="product__img-box">
            <a href="{{ route('product', ['id' => $product->id]) }}"
               class="product__img--link">
                @if($product -> images->isNotEmpty())
                    @foreach($product -> images as $image)
                        @if($product->thumb == $image->count)
                            @if($product->stock <= 0)
                                <img class="product__img grayscale" src="{{ $image->link }}"
                                     alt="">
                            @else
                                <img class="product__img" src="{{ $image->link }}" alt="">
                            @endif
                        @endif
                    @endforeach
                @else
                    <img class="product__img" src="{{ asset('assets/placeholder.svg') }}"
                         alt="{{$product->name}}">
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
            @if ($product->old_price != null && $product->old_price > $product->price)
                @php
                    $discount = (($product->price - $product->old_price) / $product->old_price) * 100;
                @endphp
                <span class="product__tag product__tag--discount"> {{ number_format($discount, 0) }} %</span>
            @endif
        </div>
        <div class="product__price m-t-10">
            @if($product->old_price != null)
                <span class="product__price-del">{{ $product->old_price }}</span>
            @endif

            <span class="product__price-reg">{{ $product->price }} тг</span><br>
            @if ($product->stock <= 0)
                <span class="product__price">Нет в наличии</span>
            @endif
        </div>
        <a href="{{ route('product', ['id' => $product->id]) }}"
           class="product__link product__link--underline product__link--weight-light">
            {{$product->name}}
        </a>
    </div> <!-- End Single Default Product -->
@endforeach
