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
                        <li class="ul">Бесплатная доставка в течение 1-2 дней в Алматы тарифом
                            "Стандарт"
                        </li>
                        <li class="ul">Быстрая доставка в течении дня по городу Алматы тарифом
                            "Экспресс"
                        </li>
                    </ul>
                    <p class="para__text">Интернет-магазин it Shop гарантирует своевременную и
                        безопасную доставку наших товаров до двери.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-single m-t-30">
                <h3 class="title title--small title--regular">Способы оплаты:</h3>
                <div class="para__content">
                    <ul>
                        <li class="ul">Оплата наличными при получении товара.</li>
                        <li class="ul">Оплата платежными картами онлайн</li>
                    </ul>
                    <p class="para__text">Оплата банковской платежной картой осуществляется с помощью
                        процессингового центра АО «Народный Банк Казахстана» epay.kkb.kz. Сервис
                        гарантирует безопасность и сохранность Ваших персональных данных.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-single m-t-30">
                <h3 class="title title--small title--regular">Права покупателя:</h3>
                <div class="para__content">
                    <p class="para__text">Покупатель вправе обменять приобретенный им доброкачественный
                        товар, в срок не позднее 14 (четырнадцати) календарных дней.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
