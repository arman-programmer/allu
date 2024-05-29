@extends('common/layout')
@section('title')
    Каталог
@endsection

@php
    $currentPath = Request::path();
    if (preg_match('/^products\/category\/\d+$/', $currentPath)) {
        $links = ['route' => 'products.category', 'title' => $category->name, 'parameters' => $category->id];
    } elseif (request()->is('products/search*')) {
        $links = ['title' => 'Поиск'];
    } elseif (preg_match('/^products\/country\/\d+$/', $currentPath)) {
        $links = ['route' => 'products.country', 'title' => 'Все продукты страны: ' . $country->name, 'parameters' => $country->id];
    } elseif (preg_match('/^products\/manufacturer\/\d+$/', $currentPath)) {
        $links = ['route' => 'products.manufacturer', 'title' => 'Все продукты производителя: ' . $manufacturer->name, 'parameters' => $manufacturer->id];
    } else {
        $links = ['title' => 'Каталог'];
    }
@endphp

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
        [
        $links
        ]
        ])
@endsection


@section('main_content')

    <div class="row flex-column-reverse flex-lg-row">
        <!-- Start Leftside - Sidebar -->
        <div class="col-lg-3">
            <!-- menu content -->
            <div class="header-menu-vertical d-lg-block d-none">
                <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i> Каталог</h4>
                <ul class="menu-content">
                    @foreach ($categories as $category)
                        @if (empty($category->sub))
                            <li class="menu-item"><a
                                    href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div> <!-- End Left Sidebar -->
        <!-- Start Rightside - Content -->
        <div class="col-lg-9">
            @if ($products->count() == 0)
                <div class="section-content">
                    @if (!empty($search))
                        <h5 class="section-content__title">По вашему запросу "{{ $search }}" ничего не найдено :(</h5>
                    @else
                        <h5 class="section-content__title">В каталоге нет ни одного товара :(</h5>
                    @endif
                </div>
            @else
                <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="sort-box">
                    <!-- Start Sort Left Side -->
                    <div class="sort-box__left">
                        <div class="sort-box__tab">
                            <ul class="sort-box__tab-list nav">
                                <li>
                                    <a class="sort-nav-link active" data-toggle="tab" href="#sort-list">
                                        <i class="icon-list"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="sort-nav-link" data-toggle="tab" href="#sort-grid">
                                        <i class="icon-grid"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <span>Отображаются {{ $products->count() }} товаров из {{ $products->total() }}.</span>
                    </div> <!-- Start Sort Left Side -->

                    <div class="sort-box__right">
                        <span>Сортировать:</span>
                        <div class="sort-box__option">
                            <label class="select-sort__arrow">
                                <select name="select-sort" class="select-sort">
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3"> Name, Z to A</option>
                                    <option value="4"> Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div> <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="product-tab-area">
                    <div class="tab-content ">
                        <div class="tab-pane show clearfix" id="sort-grid">
                            @if (!empty($sub))
                                @foreach ($sub as $category)
                                    <!-- Start Single Default Product -->
                                    <div
                                        class="product__box product__box--default product__box--border-hover text-center float-left float-4">
                                        <div class="product__img-box">
                                            <a href="{{ route('products.category', ['id' => $category->id]) }}"
                                               class="product__img--link">
                                                @if ($category->thumb)
                                                    <img class="product__img" src="{{ $category->thumb }}" alt="">
                                                @else
                                                    <img class="product__img"
                                                         src="{{ asset('assets/placeholder.svg') }}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <a href="{{ route('products.category', ['id' => $category->id]) }}"
                                           class="product__link product__link--underline product__link--weight-light m-t-15">
                                            {{$category->name}}
                                        </a>
                                    </div> <!-- End Single Default Product -->
                                @endforeach
                            @endif
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
                                                     alt="">
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

                                        <span class="product__price-reg">{{ $product->price }} тг</span>
                                        @if ($product->stock <= 0)
                                            <span class="product__price">Нет в наличии</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('product', ['id' => $product->id]) }}"
                                       class="product__link product__link--underline product__link--weight-light m-t-15">
                                        {{$product->name}}
                                    </a>
                                </div> <!-- End Single Default Product -->
                            @endforeach
                        </div>
                        <div class="tab-pane shop-list active" id="sort-list">
                            @foreach ($products as $product)
                                <!-- Start Single List Product -->
                                <div class="product__box product__box--list">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="product__img-box m-b-20">
                                                <a href="{{ route('product', ['id' => $product->id]) }}"
                                                   class="product__img--link">
                                                    @if($product -> images->isNotEmpty())
                                                        @foreach($product -> images as $image)
                                                            @if($product->thumb == $image->count)
                                                                @if($product->stock <= 0)
                                                                    <img class="product__img grayscale"
                                                                         src="{{ $image->link }}"
                                                                         alt="">
                                                                @else
                                                                    <img class="product__img" src="{{ $image->link }}"
                                                                         alt="">
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <img class="product__img"
                                                             src="{{ asset('assets/placeholder.svg') }}"
                                                             alt="">
                                                    @endif
                                                </a>
                                                @if ($product->old_price != null && $product->old_price > $product->price)
                                                    @php
                                                        $discount = (($product->price - $product->old_price) / $product->old_price) * 100;
                                                    @endphp
                                                    <span class="product__tag product__tag--discount"> {{ number_format($discount, 0) }} %</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5 pos-relative">
                                            <div class="border-right pos-absolute"></div>
                                            <div class="product__price">
                                                @if($product->old_price != null)
                                                    <span class="product__price-del">{{ $product->old_price }} тг</span>
                                                @endif
                                                <span class="product__price-reg">{{ $product->price }} тг</span>
                                                @if($product->stock == 0)
                                                    <span class="product__price"> Нет в наличии</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('product', ['id' => $product->id]) }}"
                                               class="product__link product__link--underline product__link--weight-light m-t-15">
                                                {{ $product->name }}
                                            </a>
                                            <div class="product__desc m-t-25 m-b-30">
                                                <p>{{ Str::limit($product->description, 320) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div>
                                                <ul class="shop__list-link">
                                                    <form
                                                        action="{{ route('addToCart', ['product_id' => $product->id, 'quantity' => 1]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                                class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">
                                                            в корзину
                                                        </button>
                                                    </form>
                                                    {{--                                                    <li><a href="wishlist.html"--}}
                                                    {{--                                                           class="link--gray link--icon-left shop__wishlist-icon m-b-5"><i--}}
                                                    {{--                                                                class="icon-heart"></i>Нравиться</a></li>--}}
                                                    <!-- <li><a href="#modalQuickView" data-toggle="modal" class="link--gray link--icon-left shop__quickview-icon"><i class="icon-eye"></i>Быстрый просмотр</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Start Single List Product -->
                            @endforeach
                        </div>
                    </div>
                </div>

                {{ $products->links('common.paginator') }}
            @endif
        </div> <!-- Start Rightside - Content -->
    </div>
@endsection
