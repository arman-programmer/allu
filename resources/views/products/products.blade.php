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
            @include('common.category_menu')
        </div> <!-- End Left Sidebar -->
        <!-- Start Rightside - Content -->
        <div class="col-lg-9">
            @if (!request()->is('products/search*'))
                @if ($sub->count() != 0)
                    <div class="section-content">
                        <h5 class="section-content__title">Подкатегории:</h5>
                    </div>
                    <div class="row">
                        @foreach ($sub as $category)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('products.category', ['id' => $category->id]) }}"
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
                                            <a href="{{ route('products.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </h5>
                                        <a href="{{ route('products.category', ['id' => $category->id]) }}"
                                           class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-10">
                                            Перейти
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
            @if ($products->count() == 0)
                <div class="section-content">
                    @if (!empty($search))
                        <h5 class="section-content__title">По вашему запросу "{{ $search }}" ничего не найдено :(</h5>
                    @else
                        <h5 class="section-content__title">В каталоге нет ни одного товара :(</h5>
                    @endif
                </div>
                <div class="page-not-found text-center m-t-30">
                    <img src="{{ asset('assets/mushroom.jpg') }}" alt="">
                    @if (!empty($search))
                        <p class="m-t-20">По вашему запросу "{{ $search }}" ничего не найдено :(</p>
                    @else
                        <p class="m-t-20">В каталоге нет ни одного товара :(</p>
                    @endif
                    <a href="{{ URL::previous() }}"
                       class="btn btn--box btn--small btn--blue btn--uppercase btn--weight color-white">
                        Назад
                    </a>
                </div>
            @else
                <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="sort-box m-b-15">
                    <!-- Start Sort Left Side -->
                    <div class="sort-box__left m-t-20">
                        @if($products->count() == 1)
                            <span>Отображается {{ $products->count() }} товар из {{ $products->total() }}.</span>
                        @elseif($products->count() > 1 ?? $products->count() < 5)
                            <span>Отображаются {{ $products->count() }} товара из {{ $products->total() }}.</span>
                        @else
                            <span>Отображаются {{ $products->count() }} товаров из {{ $products->total() }}.</span>
                        @endif
                    </div> <!-- Start Sort Left Side -->

                    <div class="sort-box__right m-r-20 m-t-20">
                        <span class="m-r-15">Сортировать:</span>
                        <div class="sort-box__option">
                            <label class="select-sort__arrow">
                                <select name="select-sort" class="select-sort">
                                    <option value="1">Подряд</option>
                                    {{--                                    <option value="2">Цена, по возрастанию</option>--}}
                                    {{--                                    <option value="3">Цена, по убыванию</option>--}}
                                </select>
                            </label>
                        </div>
                    </div>
                </div> <!-- ::::::  Start Sort Box Section  ::::::  -->
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ route('product', ['id' => $product->id]) }}" class="image">
                                        @if($product->images->isNotEmpty() && $product->images->first())
                                            <img class="img-fluid"
                                                 src="{{ $product->images->first()->link }}" alt="">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('assets/placeholder.svg') }}" alt="">
                                        @endif
                                    </a>
                                    @if ($product->old_price != null && $product->old_price > $product->price)
                                        @php
                                            $discount = (($product->price - $product->old_price) / $product->old_price) * 100;
                                        @endphp
                                        <span
                                            class="product-discount-label">{{ number_format($discount, 0) }} %</span>
                                    @endif
                                </div>
                                <div class="product-content">
                                    @php
                                        $averageRating = round($product->reviews->avg('stars'), 2);
                                    @endphp
                                    <ul class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageRating)
                                                <li class="fas fa-star"></li>
                                            @else
                                                <li class="far fa-star"></li>
                                            @endif
                                        @endfor
                                        <li class="far">{{ $averageRating }}
                                            ({{ $product->reviews->count()}})
                                        </li>
                                    </ul>
                                    <h5 class="title">
                                        <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                                    </h5>
                                    <div class="price">
                                        @if($product->old_price != null)
                                            <span>{{ $product->old_price }} тг.</span>
                                        @endif
                                        {{ $product->price }} тг.
                                    </div>
                                    <form
                                        action="{{ route('cart.add', ['product_id' => $product->id, 'quantity' => 1]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-b-10">
                                            в корзину
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links('common.paginator') }}
            @endif
        </div>
    </div>
@endsection
