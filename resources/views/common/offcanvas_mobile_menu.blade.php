<!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas__close offcanvas-close">&times;</button>
    <div class="offcanvas-inner">
        <form action="{{ route('city') }}" method="POST">
            @csrf
            <button class="btn btn-primary btn-lg dropdown-toggle m-b-30" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $current_city }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($cities as $city)
                    <button type="submit" class="dropdown-item" name="city" value="{{ $city }}">{{ $city }}</button>
                @endforeach
            </div>
        </form>
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
