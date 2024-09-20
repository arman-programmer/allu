@extends('common/layout')
@section('title')
    Главная
@endsection

@section('main_content')
    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-lg-3 col-xl-3">
            @include('common.category_menu')
            @include('common.blog_menu')
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
            <div class="section-content">
                <h5 class="section-content__title">Все категории товаров:</h5>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    @if (empty($category->sub))
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ route('products.category', $category->id) }}"
                                       class="image">
                                        @if($category->thumb)
                                            <img class="pic-1" src="{{ $category->thumb }}" alt="">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('assets/placeholder.svg') }}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="title">
                                        <a href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- ::::::  Start CMS Section  ::::::  -->
    <div class="row cms cms--1">
        <div class="col-md-3 col-sm-6 col-12">
            <!-- Start Single CMS box -->
            <div class="cms__content">
                <div class="cms__icon">
                    <img class="cms__icon-img" src="{{ asset('assets/icon1.png') }}" alt="">
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
                    <img class="cms__icon-img" src="{{ asset('assets/icon2.png') }}" alt="">
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
                    <img class="cms__icon-img" src="{{ asset('assets/icon3.png') }}" alt="">
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
                    <img class="cms__icon-img" src="{{ asset('assets/icon4.png') }}" alt="">
                </div>
                <div class="cms__text">
                    <h6 class="cms__title">24/7 Центр поддержки</h6>
                    <span class="cms__des">Быстрая поддержка</span>
                </div>
            </div>
        </div> <!-- End Single CMS box -->
    </div><!-- ::::::  End CMS Section  ::::::  -->
@endsection
