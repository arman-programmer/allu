@extends('common/layout')
@section('title')
    Главная
@endsection

@section('breadcrumbs')
    @include('common.breadcrumbs', ['breadcrumbs' =>
    [
    ['route' => 'posts', 'title' => "Все посты"],
    ['route' => 'post', 'title' => $post->title, 'parameters' => $post->id]
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
                    <!-- Start Single Blog List -->
                    <div class="col-12">
                        <div class="blog__type-single">
                            <div class="blog__content">
                                <h3 class="title title--small title--thin">{{ $post->title }}</h3>
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
                                <div class="img-responsive m-t-20">
                                    <img src="{{ $post->image }}" alt="">
                                </div>
                                <div class="para m-tb-20">
                                    {!! $post->body !!}
                                </div>
                            </div>
                            <!-- <div class="blog__tag-share border-around m-t-30">
                                <div class="nametag">
                                    <span>Tags:</span>
                                    <ul class="nametag__list">
                                        <li><a href="#">Fashion,</a></li>
                                        <li><a href="#">T-shirt,</a></li>
                                        <li><a href="#">White</a></li>
                                    </ul>
                                </div>
                                <div class="nametag">
                                    <span>Share:</span>
                                    <ul class="nametag__list">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div> <!-- End Single Blog List -->
                </div>
            </div>
        </div> <!-- End Rightside - Content -->
    </div>

@endsection
