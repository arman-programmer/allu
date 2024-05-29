@extends('common/layout')
@section('title')
    Главная
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'posts', 'title' => "Все посты"]
    ]
    ])
@endsection

@section('main_content')

    <div class="row flex-lg-row">
        @include('blog.sidebar')
        <!-- Start Rightside - Content -->
        <div class="col-lg-9">
            <div class="blog">
                <div class="row">
                    @if ($posts->count() == 0)
                        <div class="col-12">
                            <h5 class="section-content__title">По вашему запросу "{{ $search }}" ничего не найдено
                                :(</h5>
                        </div>
                    @else
                        @foreach($posts as $post)
                            <!-- Start Single Blog List -->
                            <div class="col-12">
                                <div class="blog__type-list">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="blog__img"><a href="{{ route('post', $post->id) }}"><img
                                                        src="{{ $post->image }}" alt=""></a></div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="blog__content">
                                                <a class="link--gray" href=" {{ route('post', $post->id) }}">
                                                    <h3 class="title title--small title--thin">{{ $post->title }}</h3>
                                                </a>
                                                <div class="blog__archive m-t-20">
                                                    @php
                                                        $postDate = $post->created_at;
                                                        $postDateTime = new DateTime($postDate);
                                                        $currentDateTime = new DateTime();
                                                        $postDateOnly = $postDateTime->format('Y-m-d');
                                                        $currentDateOnly = $currentDateTime->modify('+1 day')->format('Y-m-d');
                                                        $yesterdayDateTime = (clone $currentDateTime)->modify('-1 day');
                                                        $yesterdayDateOnly = $yesterdayDateTime->format('Y-m-d');
                                                        if ($postDateOnly == $currentDateOnly) {
                                                        $date = "Сегодня в " . $postDateTime->format('H:i');
                                                        } elseif ($postDateOnly == $yesterdayDateOnly) {
                                                        $date = "Вчера в " . $postDateTime->format('H:i');
                                                        } else {
                                                        $date = $postDateTime->format('d.m.Y');
                                                        }
                                                    @endphp
                                                    <a href="#" class="link--gray link--icon-left m-r-30"><i
                                                            class="far fa-calendar"></i> {{ $date }}</a>
                                                    <a href="#" class="link--gray link--icon-left"><i
                                                            class="far fa-user"></i> {{ $post->author }}</a>
                                                </div>
                                                <div class="para m-tb-20">
                                                    <p class="para__text">
                                                        {{ $post->description }}
                                                    </p>
                                                </div>
                                                <a class="link--gray link--icon-right"
                                                   href="{{ route('post', $post->id) }}">Читать дальше... <i
                                                        class="icon-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Single Blog List -->
                        @endforeach
                    @endif
                </div>
            </div>
            {{ $posts->links('common.paginator') }}
        </div> <!-- End Rightside - Content -->
    </div>

@endsection
