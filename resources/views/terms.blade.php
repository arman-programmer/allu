@extends('common/layout')
@section('title')
    Условия использования
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'terms', 'title' => 'Политика'],
    ]
    ])
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="about-single m-t-30">
                <div class="terms-and-conditions">
                    <h5 class="title title--small title--regular">Условия использования сайта:</h5>
                    <p class="para__text">
                        <strong>1. Определение терминов:</strong><br>
                        - Покупатель: физическое или юридическое лицо, совершающее покупку на нашем сайте.<br>
                        - Продавец: наш интернет-магазин.<br>
                        - Товар: продукция, представленная на нашем сайте для продажи.
                    </p>

                    <p class="para__text">
                        <strong>2. Права и обязанности:</strong><br>
                        - Покупатель обязуется предоставить достоверные данные при оформлении заказа.<br>
                        - Продавец обязуется предоставить информацию о товаре и его доставке в полном объеме.
                    </p>

                    <h5 class="title title--small title--regular">Процесс заказа:</h5>
                    <p class="para__text">
                        <strong>3. Шаги оформления заказа:</strong><br>
                        - Выбор товара и добавление его в корзину.<br>
                        - Оформление заказа на странице корзины.<br>
                        - Выбор способа доставки и оплаты.<br>
                        - Подтверждение заказа.
                    </p>

                    <p class="para__text">
                        <strong>4. Условия подтверждения заказа:</strong><br>
                        - Заказ считается подтвержденным после получения нашим магазином подтверждения заказа по
                        электронной почте.
                    </p>
                    <h5 class="title title--small title--regular">Процесс заказа:</h5>
                    <p class="para__text">
                        <strong>3. Доставка:</strong><br>
                        - Курьерская доставка.<br>
                        - Почтовая доставка.<br>
                        - Самовывоз.<br>
                    </p>


                    <p class="para__text">
                        <strong>3.1. Способы доставки:</strong><br>
                        - Курьерская доставка.<br>
                        - Почтовая доставка.<br>
                        - Самовывоз.<br>
                    </p>
                    <p class="para__text">
                        <strong>3.2. Сроки и стоимость доставки:</strong><br>
                        - Сроки и стоимость доставки указываются при оформлении заказа и зависят от выбранного способа
                        доставки и места назначения.
                    </p>
                    <p class="para__text">
                        <strong>4. Возврат и обмен товара:</strong><br>
                    </p>
                    <p class="para__text">
                        <strong>4.1. Условия возврата и обмена товара:</strong><br>
                        - Товар можно вернуть или обменять в течение 14 дней с момента получения.<br>
                        - Товар должен быть в оригинальной упаковке и состоянии.<br>
                    </p>
                    <p class="para__text">
                        <strong>4.2. Сроки и условия возмещения стоимости товара:</strong><br>
                        - Стоимость товара будет возмещена на тот же способ, которым была произведена оплата.<br>
                    </p>
                    <h5 class="title title--small title--regular">5. Гарантия:</h5>
                    <p class="para__text">
                        <strong>5.1. Условия гарантийного обслуживания товара:</strong><br>
                        - Гарантийный срок на товар составляет 1 год с момента покупки.<br>
                    </p>
                    <h5 class="title title--small title--regular">6. Конфиденциальность и защита данных:</h5>
                    <p class="para__text">
                        <strong>6.1. Политика конфиденциальности:</strong><br>
                        - Наш магазин обязуется не раскрывать персональные данные покупателей третьим лицам.<br>
                    </p>
                    <h5 class="title title--small title--regular">7. Ответственность:</h5>
                    <p class="para__text">
                        <strong>7.1. Ограничение ответственности магазина:</strong><br>
                        - Наш магазин не несет ответственности за неправильное использование товара.<br>
                    </p>
                    <h5 class="title title--small title--regular">8. Контактная информация:</h5>
                    <p class="para__text">
                        <strong>8.1. Контактная информация магазина:</strong><br>
                        - Телефон: +7 (XXX) XXX-XX-XX<br>
                        - Электронная почта: info@example.com<br>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
