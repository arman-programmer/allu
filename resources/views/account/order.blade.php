@extends('common/layout')
@section('title')
    Мой аккаунт
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'account', 'title' => 'Личный кабинет'],
    ]
    ])
@endsection

@section('main_content')
    <style>

        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px;
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important;
        }

        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff;
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%;
        }

        #progressbar li:nth-child(2):after, #progressbar li:nth-child(3):after {
            left: -50%;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #651FFF;
        }

        .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px;
        }

        .icon-content {
            padding-bottom: 20px;
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%;
            }
        }
    </style>
    <div class="container px-1 px-md-4 py-5 mx-auto">
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>ORDER <span class="text-primary font-weight-bold">{{ $order->id }}</span></h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                    <p>USPS <span class="font-weight-bold">234094567242423422898</span></p>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    @if($product)
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="product-grid">
                                <div class="product-image">
                                    {{--                                    <a href="{{ route('product', ['id' => $product->id]) }}" class="image">--}}
                                    {{--                                        @if($product->images->isNotEmpty() && $product->images->first())--}}
                                    {{--                                            <img class="img-fluid"--}}
                                    {{--                                                 src="{{ $product->images->first()->link }}" alt="">--}}
                                    {{--                                        @else--}}
                                    {{--                                            <img class="img-fluid"--}}
                                    {{--                                                 src="{{ asset('assets/placeholder.svg') }}" alt="">--}}
                                    {{--                                        @endif--}}
                                    {{--                                    </a>--}}
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
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Add class 'active' to progress -->
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="active step0"></li>
                        <li class="step0"></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-between top">
                <div class="row d-flex icon-content">
                    <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Processed</p>
                    </div>
                </div>
                <div class="row d-flex icon-content">
                    <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Shipped</p>
                    </div>
                </div>
                <div class="row d-flex icon-content">
                    <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>En Route</p>
                    </div>
                </div>
                <div class="row d-flex icon-content">
                    <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Arrived</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn--box btn--small btn--uppercase btn--blue">
                    Назад
                </button>
                <button class="btn btn--box btn--small btn--uppercase btn--blue">
                    Вперуд
                </button>
            </div>
        </div>
    </div>
@endsection
