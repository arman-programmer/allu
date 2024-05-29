<!-- ::::::  Start Mobile Header Section  ::::::  -->
<div class="header__mobile mobile-header--1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Start Header Mobile Top area -->
                <div class="header__mobile-top">
                    <div class="mobile-header__logo">
                        <a href="{{ route('home') }}" class="mobile-header__logo-link">
                            <img src="{{ asset('assets/logo1.svg') }}" alt="" class="mobile-header__logo-img">
                        </a>
                    </div>
                    <div class="header__wishlist-box">
                        <!-- Start Header Wishlist Box
                        <div class="header__wishlist pos-relative">
                            <a href="wishlist" class="header__wishlist-link">
                                <i class="icon-heart"></i>
                                <span class="wishlist-item-count pos-absolute">3</span>
                            </a>
                        </div>  End Header Wishlist Box -->

                        <!-- Start Header Add Cart Box -->
                        <div class="header-add-cart pos-relative m-l-20">
                            <a href="#offcanvas-add-cart__box"
                               class="header__wishlist-link offcanvas--open-checkout offcanvas-toggle">
                                <i class="icon-shopping-cart"></i>
                                <span class="wishlist-item-count pos-absolute">
                                            @if ($products != null)
                                        {{ count($products) }}
                                    @else
                                        0
                                    @endif
                                        </span>
                            </a>
                        </div> <!-- End Header Add Cart Box -->

                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i
                                class="icon-menu"></i></a>

                    </div>
                </div> <!-- End Header Mobile Top area -->

                <!-- Start Header Mobile Middle area -->
                <div class="header__mobile-middle header__top--style-1 p-tb-10">
                    <form class="header__search-form" action="{{ route('products.search') }}" method="GET">
                        @csrf
                        <div class="header__search-input header__search-input--mobile">
                            <input type="search" name="search" placeholder="Введите ключевое слово">
                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight" type="submit"><i
                                    class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div> <!-- End Header Mobile Middle area -->

            </div>
        </div>
    </div>
</div> <!-- ::::::  Start Mobile Header Section  ::::::  -->
