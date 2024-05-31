<!-- ::::::  Start Large Header Section  ::::::  -->
<div class="header header--1">
    <!-- Start Header Middle area -->
    <div class="header__middle header__middle--style-2 p-tb-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('home') }}" class="header__logo-link">
                            <img src="{{ asset('assets/logo.svg') }}" alt="" class="header__logo-img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form class="header__search-form" action="{{ route('products.search') }}" method="get">
                        @csrf
                        <div class="header__search-input">
                            <input type="search" name="search" placeholder="Введите ключевое слово">
                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight yellow-bg"
                                    type="submit">Поиск
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="header__top-content--right">
                        <div class="user-info user-set-role">
                            <p class="user-set-role__button white-color" data-toggle="dropdown"
                               aria-haspopup="true">{{ $current_city }} <i class="fal fa-chevron-down"></i></p>
                            <form action="{{ route('city') }}" method="POST">
                                @csrf
                                <ul class="expand-dropdown-menu dropdown-menu">
                                    @foreach($cities as $city)
                                        <li>
                                            <button type="submit" name="city" value="{{ $city }}">{{ $city }}</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Header Middle area -->

    <!-- Start Header Menu Area -->
    <nav class="header-menu">
        <div class="container">
            <div class="row col-12 justify-content-between">
                <nav>
                    <ul class="header__nav">
                        <li class="header__nav-item pos-relative">
                            <a href="{{ route('home') }}" class="header__nav-link">Главная</a>
                        </li>
                        <li class="header__nav-item pos-relative">
                            <a href="{{ route('account') }}" class="header__nav-link">Личный кабинет</a>
                        </li>
                        <li class="header__nav-item pos-relative">
                            <a href="{{ route('about') }}" class="header__nav-link">Доставка и оплата</a>
                        </li>
                        <li class="header__nav-item pos-relative">
                            <a href="{{ route('posts') }}" class="header__nav-link">Статьи</a>
                        </li>
                        <li class="header__nav-item pos-relative">
                            <a href="{{ route('contact') }}" class="header__nav-link">Контакты</a>
                        </li>
                    </ul>
                </nav>

                <div class="header__wishlist-box">
                    <!-- Start Header Wishlist Box
                    <div class="header__wishlist pos-relative">
                        <a href="wishlist" class="header__wishlist-link">
                            <i class="icon-heart white-color"></i>
                            <span class="wishlist-item-count pos-absolute yellow-bg">3</span>
                        </a>
                    </div> End Header Wishlist Box -->
                    @if(Auth::check())
                        @if(Auth::user()->role == "admin")
                            <div class="header__wishlist pos-relative">
                                <a href="{{ route('admin.home') }}" class="header__wishlist-link">
                                    <i class="fa fa-person-dolly white-color"></i>
                                </a>
                            </div>
                        @endif
                    @endif
                    <div class="header-add-cart pos-relative m-l-40">
                        <a href="#offcanvas-add-cart__box" class="header__wishlist-link offcanvas-toggle">
                            <i class="icon-shopping-cart white-color"></i>
                            <span class="wishlist-item-count pos-absolute yellow-bg">
                                @if ($products != null)
                                    {{ count($products) }}
                                @else
                                    0
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav> <!-- End Header Menu Area -->
</div> <!-- ::::::  End Large Header Section  ::::::  -->
