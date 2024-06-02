@extends('common/layout')
@section('title')
    {{ $product->name }}
@endsection

@php
    if ($category == null) {
        $link = [
            ['route' => 'product', 'title' => $product->name, 'parameters' => $product->id]
        ];
    } else {
        $link = [
            ['route' => 'products.category', 'title' => $category->name, 'parameters' => $category->id],
            ['route' => 'product', 'title' => $product->name, 'parameters' => $product->id]
        ];
    }
@endphp

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
        $link
    ])
@endsection

@section('main_content')
    <div class="row">
        <!-- Start Product Details Gallery -->
        <div class="col-12">
            <div class="product-details">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery-box m-b-30">
                            <div class="product-image--large overflow-hidden">
                                @if($product -> images->isNotEmpty())
                                    @foreach($product -> images as $image)
                                        @if($product->thumb == $image->count)
                                            <img class="img-fluid" id="img-zoom" src="{{ $image->link }}" alt="">
                                        @endif
                                    @endforeach
                                @else
                                    <img class="img-fluid" id="img-zoom" src="{{ asset('assets/placeholder.svg') }}"
                                         alt="">
                                @endif
                            </div>
                            @if($product -> images->isNotEmpty())
                                <div class="pos-relative m-t-30">
                                    <div id="gallery-zoom"
                                         class="product-image--thumb product-image--thumb-horizontal overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                        <div class="swiper-wrapper">
                                            @foreach($product -> images as $image)
                                                <div class="swiper-slide">
                                                    <a class="zoom-active"
                                                       data-image="{{ asset($image->link) }}">
                                                        <img class="img-fluid"
                                                             src="{{ asset($image->link) }}"
                                                             alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-buttons">
                                        <div class="swiper-button-next gallery__nav gallery__nav--next"><i
                                                class="fal fa-chevron-right"></i></div>
                                        <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i
                                                class="fal fa-chevron-left"></i></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details-box m-b-30">
                            <h5 class="section-content__title">{{ $product->name }}</h5>
                            <span class="text-reference">{{ $averageRating }} звёзд ({{ $totalReviews }})</span>
                            <div class="review-box">
                                <ul class="product__review m-t-10 m-b-15">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <=$averageRating)
                                            <li class="product__review--fill"><i class="fa fa-star"></i></li>
                                        @else
                                            <li class="product__review--blank"><i class="fa fa-star"></i></li>
                                        @endif
                                    @endfor
                                </ul>
                                <a href="#modalReview" data-toggle="modal" class="link--gray link--icon-left m-b-5">
                                    <i class="fal fa-edit"></i>
                                    Оставить отзыв
                                </a>
                                @if(Auth::check())
                                    @if(Auth::user()->role == "admin")
                                        <a href="{{ route('admin.product.edit', parameters: ['id'=>$product->id]) }}"
                                           class="link--gray link--icon-left m-b-5">
                                            <i class="fal fa-edit"></i>
                                            Редактировать
                                        </a>
                                    @endif
                                @endif
                            </div>
                            <div class="product__price">
                                @if ($product->old_price)
                                    <span class="product__price-del">{{ $product->old_price }} тг</span>
                                @endif
                                <span class="product__price-reg">{{ $product->price}} тг</span>
                            </div>
                            <div class="product__desc m-t-25 m-b-30">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product-var p-t-30">
                                <div class="product-size product-var__item">
                                    <span class="product-var__text">В наличии: {{ $product->stock }}</span>
                                </div>
                                @if ($product->country )
                                    <div class="product-color product-var__item">
                                        <span class="product-var__text">Страна производства: <a
                                                href="{{ route('products.country', ['id' => $product->country->id]) }}">{{ $product->country->name }}</a> </span>
                                    </div>
                                @endif
                                @if ($product->manufacturer )
                                    <div class="product-color product-var__item">
                                        <span class="product-var__text">Производитель: <a
                                                href="{{ route('products.manufacturer', ['id' => $product->manufacturer->id]) }}">{{ $product->manufacturer->name }}</a> </span>
                                    </div>
                                @endif
                                @if ($city )
                                    <div class="product-color product-var__item">
                                        <span class="product-var__text">Город: {{ $city }} </span>
                                    </div>
                                @endif
                                <div class="product-quantity product-var__item">
                                    <span class="product-var__text">Количество</span>
                                    <div class="product-quantity-box">
                                        <form
                                            action="{{ route('addToCart', ['product_id' => $product->id, 'quantity' => 'placeholder']) }}"
                                            method="post">
                                            @csrf
                                            <div class="quantity">
                                                <input name="quantity" type="number" min="1" max="50" step="1"
                                                       value="1">
                                            </div>
                                            <button type="submit"
                                                    class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">
                                                В корзину
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Product Details Gallery -->

        <!-- Start Product Details Tab -->
        <div class="col-12">
            <div class="border-around product-details-tab-area m-b-30">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content--border">
                            <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-70 nav">
                                @if (!$product->details->isEmpty() || $product->details != null)
                                    <li>
                                        <a class="nav-link active" data-toggle="tab" href="#product-dis">
                                            Характеристики
                                        </a>
                                    </li>
                                    @if ($product->size != null || $product->size != 0)
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#product-sizes">
                                                Габариты
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="nav-link" data-toggle="tab" href="#product-review">Отзывы</a>
                                    </li>
                                @else
                                    @if ($product->size != null || $product->size != 0)
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#product-sizes">
                                                Габариты
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#product-review">
                                                Отзывы
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#product-review">
                                                Отзывы
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-details-tab-box m-t-50">
                            <div class="tab-content">
                                {{ dd($product->details) }}
                                @if (!$product->details->isEmpty() || $product->details != null)
                                    <!-- Start Tab - Product Details -->
                                    <div class="tab-pane show active" id="product-dis">
                                        <div class="product-dis__content">
                                            <div class="table-responsive-md">
                                                <table class="product-dis__list table table-bordered">
                                                    <tbody>
                                                    @foreach ($product->details as $detail)
                                                        <tr>
                                                            <td class="product-dis__title">{{ $detail->name }}</td>
                                                            <td class="product-dis__text">{{ $detail->value }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> <!-- End Tab - Product Details -->
                                @endif
                                @if ($product->size != null || $product->size != 0)
                                    <!-- Start Tab - Product Sizes -->
                                    <div class="tab-pane @if ($product->details->isEmpty()) active @endif"
                                         id="product-sizes">
                                        <div class="product-dis__content">
                                            <div class="table-responsive-md">
                                                <table class="product-dis__list table table-bordered">
                                                    <tbody>
                                                    @if ($product->size->weight != null)
                                                        <tr>
                                                            <td class="product-dis__title">Вес</td>
                                                            <td class="product-dis__text">{{ $product->size->weight }}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->size->height != null)
                                                        <tr>
                                                            <td class="product-dis__title">Высота</td>
                                                            <td class="product-dis__text">{{ $product->size->height }}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->size->width != null)
                                                        <tr>
                                                            <td class="product-dis__title">Ширина</td>
                                                            <td class="product-dis__text">{{ $product->size->width }}</td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->size->length != null)
                                                        <tr>
                                                            <td class="product-dis__title">Длина</td>
                                                            <td class="product-dis__text">{{ $product->size->length }}</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> <!-- Start Tab - Product Sizes -->
                                @endif
                                <!-- Start Tab - Product Review -->
                                <div
                                    class="tab-pane @if ($product->details->isEmpty() && $product->size == null) active @endif"
                                    id="product-review">
                                    @if (!$product->reviews->isEmpty())
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            @foreach ($product->reviews as $review)
                                                <!-- Start - Review Comment list-->
                                                <li class="comment__list">
                                                    <div class="comment__wrapper">
                                                        <div class="comment__img">
                                                            <img
                                                                src="https://www.svgrepo.com/show/508699/landscape-placeholder.svg"
                                                                alt="user">
                                                        </div>
                                                        <div class="comment__content">
                                                            <div class="comment__content-top">
                                                                <div class="comment__content-left">
                                                                    <h6 class="comment__name">{{ $review->user->name }}</h6>
                                                                    <ul class="product__review">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <=$review->stars)
                                                                                <li class="product__review--fill"><i
                                                                                        class="fa fa-star"></i></li>
                                                                            @else
                                                                                <li class="product__review--blank"><i
                                                                                        class="fa fa-star"></i></li>
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="para__content">
                                                                <p class="para__text">{{ $review->text }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li> <!-- End - Review Comment list-->
                                            @endforeach
                                        </ul> <!-- End - Review Comment -->
                                    @else
                                        <h5>Пока нет отзывов</h5>
                                    @endif

                                    <a href="#modalReview" data-toggle="modal"
                                       class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Оставить
                                        отзыв</a>
                                </div> <!-- Start Tab - Product Review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Product Details Tab -->
        @include('products.modules.recommendation')
    </div>
    @include('products.modules.modal_review')
@endsection
