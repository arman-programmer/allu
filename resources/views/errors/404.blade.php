@extends('common/layout')
@section('title')
    Страница не найдена
@endsection
@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['title' => "Несуществующая ссылка"]
    ]
    ])
@endsection
@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="section-content">
                <h5 class="section-content__title">Такой страницы не существует :(</h5>
            </div>
            <div class="page-not-found text-center m-t-40">
                <img class="banner__img" src="{{ asset('assets/img/404.png') }}" alt="">
                <h4>Приносим извинения за неудобства.</h4>
                <p>Возможно страница была удалена, либо перенесена</p>
                <a href="{{ route('home') }}"
                   class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-10">
                    Вернуться на главную
                </a>
            </div>
        </div>
    </div>

@endsection
