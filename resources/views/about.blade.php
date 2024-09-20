@extends('common/layout')
@section('title')
    Доставка и оплата
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'about', 'title' => 'Доставка и оплата'],
    ]
    ])
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <div class="about-single m-t-30">
                <h3 class="title title--small title--regular">Способы доставок:</h3>
                <div class="para__content">
                    <ul>
                        <li class="ul">
                            Бесплатная доставка в течение дня по городу Алматы
                        </li>
                    </ul>
                    <p class="para__text">
                        Интернет-магазин ALLU.kz гарантирует своевременную и
                        безопасную доставку своих товаров до двери.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-single m-t-30">
                <h3 class="title title--small title--regular">Способы оплаты:</h3>
                <div class="para__content">
                    <ul>
                        <li class="ul">Оплата наличными при получении товара.</li>
                    </ul>
                    <p class="para__text">
                        Вы будете оплачивать за товар только после его получения и осмотра
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-single m-t-30">
                <h3 class="title title--small title--regular">Права покупателя:</h3>
                <div class="para__content">
                    <p class="para__text">
                        Покупатель вправе обменять приобретенный им доброкачественный
                        товар, в срок не позднее 14 (четырнадцати) календарных дней.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
