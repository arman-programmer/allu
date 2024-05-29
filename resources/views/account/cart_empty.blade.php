@extends('common/layout')
@section('title')
    Корзина
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'cart', 'title' => 'Пустая корзина'],
    ]
    ])
@endsection

@section('main_content')
    @section('main_content')

        <div class="row">
            <div class="col-12">
                <div class="section-content">
                    <h5 class="section-content__title">Товары в вашей корзине</h5>
                </div>
                <div class="empty-cart m-t-40 text-center">
                    <div class="empty-cart-icon title--normal "><i class="fal fa-shopping-cart"></i></div>
                    <h3 class="title title--normal title--thin m-tb-30">Ваша корзина пуста</h3>
                    @if(!empty(url()->previous() && url()->previous() != url()->current()))
                        <a href="{{ url()->previous() }}"
                           class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Продолжить
                            покупки</a>
                    @else
                        <a href="{{ route('home') }}"
                           class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Вернуться на
                            главную</a>
                    @endif
                </div>
            </div>
        </div>

    @endsection
