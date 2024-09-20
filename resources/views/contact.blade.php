@extends('common/layout')
@section('title')
    Контакты
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'contact', 'title' => 'Контакты'],
    ]
    ])
@endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="contact-info-wrap gray-bg">
                <div class="single-contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-info-dec">
                        <span>Номер телефона:</span>
                        <a href="tel://+77719093655">+7 771 909 36 55</a>
                    </div>
                </div>
                <div class="single-contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <div class="contact-info-dec">
                        <span>Сайт:</span>
                        <a href="https://allu.kz/">allu.kz</a>
                    </div>
                </div>
                <div class="single-contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info-dec">
                        <span>Адрес:</span>
                        <span>Магазин работает только онлайн и не имеет физического адреса</span>
                    </div>
                </div>
                <div class="contact-social m-t-40">
                    <div class="section-content">
                        <h5 class="section-content__title">Мы в соц. сетях:</h5>
                    </div>
                    <div class="social-link m-t-30">
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
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
            </div>
        </div>
    </div>

@endsection
