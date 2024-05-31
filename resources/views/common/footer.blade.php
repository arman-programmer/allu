<!-- ::::::  Start  Footer Section  ::::::  -->
<footer class="footer">
    <div class="footer__top gray-bg p-t-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ route('home') }}" class="footer__logo-link">
                                <img src="{{ asset('assets/logo1.svg') }}" alt="logo" class="footer__logo-img">
                            </a>
                        </div>
                        <div class="footer__text">
                            <p>Сайт работает в тестовом режиме. Мы стараемся улучшить сервис!</p>
                        </div>
                        <ul class="footer__address">
                            <li class="footer__address-item"><span>Время работы: </span> <a>c 10:00 до 18:00</a></li>
                            <li class="footer__address-item"><span>Позвоните нам: </span> <a
                                    href="tel:+7-771-909-36-55">+7 771 909 36 55</a></li>
                            <li class="footer__address-item"><span>Поддержка: </span> <a
                                    href="mailto:berkutbayev.18@gmail.com">berkutbayev.18@gmail.com </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="footer__menu">
                        <h4 class="footer__nav-title">Навигация</h4>
                        <ul class="footer__nav">
                            <li class="footer__list">
                                <a href="{{ route('account') }}" class="footer__link">
                                    Личный кабинет
                                </a>
                            </li>
                            <li class="footer__list">
                                <a href="{{ route('about') }}" class="footer__link">
                                    Доставка и оплата
                                </a>
                            </li>
                            <li class="footer__list">
                                <a href="{{ route('posts') }}" class="footer__link">
                                    Статьи
                                </a>
                            </li>
                            <li class="footer__list">
                                <a href="{{ route('contact') }}" class="footer__link">
                                    Контакты
                                </a>
                            </li>
                            <li class="footer__list">
                                <a href="{{ route('terms') }} " class="footer__link">Правила и условия</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="footer__menu">
                        <h4 class="footer__nav-title">Мы в соц. сетях</h4>
                        <ul class="footer__social-nav">
                            <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                        class="fab fa-google-plus-g"></i></a></li>
                            <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                        class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer__form">
                        <h4 class="footer__nav-title">Закажите звонок:</h4>
                        <form method="post" action="{{ route('call') }}" class="footer__form-box">
                            @csrf
                            <input type="phone" name="phone" id="phone" class="tel" placeholder="+7(777)777-77-77"
                                   @if (Auth::check()) value="+7{{ Auth::user()->phone }}" @endif minlength="17"
                                   required>
                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">
                                Заказать!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="footer__copyright-text">
                        <p>ALLU.kz © 2024 | Интернет-магазин</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> <!-- ::::::  End  Footer Section  ::::::  -->
