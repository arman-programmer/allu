<!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas__close offcanvas-close">&times;</button>
    <div class="offcanvas-inner">
        <div class="offcanvas-userpanel m-b-30">
            <ul>
                <li class="offcanvas-userpanel__role">
                    <form action="{{ route('city') }}" method="POST">
                        @csrf
                        <p>{{ $current_city }}</p>
                        <ul class="user-sub-menu">
                            @foreach($cities as $city)
                                <li>
                                    <button type="submit" name="city" value="{{ $city }}">{{ $city }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                </li>
            </ul>
        </div>
        <div class="offcanvas-menu m-b-30">
            <h4>Меню:</h4>
            <ul>
                <li><a href="{{ route('home') }}"><span>Главная</span></a></li>
                <li><a href="{{ route('account') }}">Личный кабинет</a></li>
                <li><a href="{{ route('about') }}">Доставка и оплата</a></li>
                <li><a href="{{ route('posts') }}">Статьи</a></li>
                <li><a href="{{ route('contact') }}">Контакты</a></li>
            </ul>
        </div>
        <hr>
        <div class="offcanvas-social">
            <span>Мы в соц. сетях</span>
            <ul>
                <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div> <!-- ::::::  End Mobile-offcanvas Menu Section  ::::::  -->
