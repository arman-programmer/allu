@extends('common/layout')
@section('title')
    Главная
@endsection

@section('main_content')
    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-lg-3 col-xl-3">
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
            <!-- ::::::  Start  Blog News  ::::::  -->
            <div class="blog blog--2 swiper-outside-arrow-hover">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="section-content section-content--border d-flex align-items-center justify-content-between">
                            <h5 class="section-content__title">Статьи</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-outside-arrow-fix pos-relative">
                            <div class="blog-news blog-news-1grid overflow-hidden  m-t-30">
                                <div class="swiper-wrapper">
                                    @foreach ($posts as $post)
                                        <!-- Single Blog News Item -->
                                        <div class="blog-news__box swiper-slide text-center">
                                            <div class="blog-news__img-box">
                                                <a href="posts" class="blog-news__img--link">
                                                    <img src="{{ asset($post->image) }}" alt="" class="blog-news__img">
                                                </a>
                                            </div>
                                            @php
                                                $postDate = $post->created_at;
                                                $postDateTime = new DateTime($postDate);
                                                $currentDateTime = new DateTime();
                                                $postDateOnly = $postDateTime->format('Y-m-d');
                                                $currentDateOnly = $currentDateTime->modify('+1 day')->format('Y-m-d');
                                                $yesterdayDateTime = (clone $currentDateTime)->modify('-1 day');
                                                $yesterdayDateOnly = $yesterdayDateTime->format('Y-m-d');
                                                if ($postDateOnly == $currentDateOnly) {
                                                $date = "Сегодня в " . $postDateTime->format('H:i');
                                                } elseif ($postDateOnly == $yesterdayDateOnly) {
                                                $date = "Вчера в " . $postDateTime->format('H:i');
                                                } else {
                                                $date = $postDateTime->format('d.m.Y');
                                                }
                                            @endphp
                                            <div class="blog-news__archive m-t-25">
                                                <a href="#" class="blog-news__postdate"><i
                                                        class="far fa-calendar"></i> {{ $date }}</a>
                                                <a href="#" class="blog-news__author"><i
                                                        class="far fa-user"></i> {{ $post->author }}</a>
                                            </div>
                                            <a href="posts" class="blog-news__link">
                                                <h5>{{ $post->title }}</h5>
                                            </a>
                                        </div> <!-- End Blog News Item -->
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
            </div> <!-- ::::::  End  Blog News   ::::::  -->
        </div>
        <div class="col-lg-9 col-xl-9">
            {{--            <!-- ::::::  Start banner Section  ::::::  -->--}}
            {{--            <div class="banner banner--1">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <div class="banner__box">--}}
            {{--                            <a href="#" class="banner__link">--}}
            {{--                                <img src="{{ asset('assets/banner.png') }}" alt="" class="banner__img">--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div> <!-- ::::::  End banner Section  ::::::  -->--}}
            <!-- ::::::  Start  Product Style - Default Section [2column]  ::::::  -->
            <div class="product product--1 swiper-outside-arrow-hover">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="section-content section-content--border d-md-flex align-items-center justify-content-between m-b-30">
                            <h5 class="section-content__title">Категории товаров: </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tab-area">
                <div class="tab-content ">
                    <div class="tab-pane show active clearfix" id="sort-grid">
                        @foreach ($categories as $category)
                            @if (empty($category->sub))
                                <!-- Start Single Default Product -->
                                <div
                                    class="product__box product__box--default product__box--border-hover text-center float-left float-4">
                                    <div class="product__img-box">
                                        <a href="{{ route('products.category', $category->id) }}"
                                           class="product__img--link">
                                            @if (!empty($category->thumb))
                                                <img class="product__img" src="{{ $category->thumb }}" alt="">
                                            @else
                                                <img class="product__img" src="{{ asset('assets/placeholder.svg') }}"
                                                     alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <a href="shop"
                                       class="product__link product__link--underline product__link--weight-light m-t-15">
                                        {{ $category->name }}
                                    </a>
                                </div> <!-- End Single Default Product -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ::::::  Start CMS Section  ::::::  -->
    <div class="row cms cms--1">
        <div class="col-md-3 col-sm-6 col-12">
            <!-- Start Single CMS box -->
            <div class="cms__content">
                <div class="cms__icon">
                    <img class="cms__icon-img" src="assets/img/icon/cms/icon1.png" alt="">
                </div>
                <div class="cms__text">
                    <h6 class="cms__title">Бесплатная доставка </h6>
                    <span class="cms__des">По городу Алматы</span>
                </div>
            </div>
        </div> <!-- End Single CMS box -->
        <!-- Start Single CMS box -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="cms__content">
                <div class="cms__icon">
                    <img class="cms__icon-img" src="assets/img/icon/cms/icon2.png" alt="">
                </div>
                <div class="cms__text">
                    <h6 class="cms__title">Удобный способ оплаты</h6>
                    <span class="cms__des">Оплатите только при получении</span>
                </div>
            </div>
        </div> <!-- End Single CMS box -->
        <!-- Start Single CMS box -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="cms__content">
                <div class="cms__icon">
                    <img class="cms__icon-img" src="assets/img/icon/cms/icon3.png" alt="">
                </div>
                <div class="cms__text">
                    <h6 class="cms__title">Возврат денег</h6>
                    <span class="cms__des">В течении 14 дней</span>
                </div>
            </div>
        </div> <!-- End Single CMS box -->
        <!-- Start Single CMS box -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="cms__content">
                <div class="cms__icon">
                    <img class="cms__icon-img" src="assets/img/icon/cms/icon4.png" alt="">
                </div>
                <div class="cms__text">
                    <h6 class="cms__title">24/7 Центр поддержки</h6>
                    <span class="cms__des">Быстрая поддержка</span>
                </div>
            </div>
        </div> <!-- End Single CMS box -->
    </div><!-- ::::::  End CMS Section  ::::::  -->

    <div class="row">
        <div class="col-md-3 col-sm-6">

            <div class="product-grid">

                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="images/img-1.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>

                    <ul class="product-links">

                        <li><a href="#" data-tip="Add to Wishlist"><i class="fas fa-heart"></i></a></li>

                        <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>

                        <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>

                    </ul>

                </div>

                <div class="product-content">

                    <ul class="rating">

                        <li class="fas fa-star"></li>

                        <li class="fas fa-star"></li>

                        <li class="fas fa-star"></li>

                        <li class="far fa-star"></li>

                        <li class="far fa-star"></li>

                    </ul>
                    <h3 class="title"><a href="#">Men's Blazer</a></h3>

                    <div class="price"><span>$90.00</span> $66.00</div>
                    <a class="add-to-cart" href="#">add to cart</a>

                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-6">

            <div class="product-grid">

                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="images/img-2.jpg">
                    </a>

                    <ul class="product-links">

                        <li><a href="#" data-tip="Add to Wishlist"><i class="fas fa-heart"></i></a></li>

                        <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>

                        <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>

                    </ul>

                </div>

                <div class="product-content">

                    <ul class="rating">

                        <li class="fas fa-star"></li>

                        <li class="fas fa-star"></li>

                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="far fa-star"></li>
                    </ul>
                    <div class="price">$79.90</div>
                </div>
            </div>
        </div>
    </div>
@endsection
