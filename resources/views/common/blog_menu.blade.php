<!-- ::::::  Start  Blog News  ::::::  -->
<div class="blog blog--2 swiper-outside-arrow-hover">
    <div class="row">
        <div class="col-12">
            <div
                class="section-content section-content--border d-flex align-items-center justify-content-between">
                <h5 class="section-content__title">Статьи</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="swiper-outside-arrow-fix pos-relative">
                <div class="blog-news blog-news-1grid overflow-hidden  m-t-30">
                    <div class="swiper-wrapper">
                        @foreach ($posts as $post)
                            <!-- Single Blog News Item -->
                            <div class="blog-news__box swiper-slide text-center">
                                <div class="blog-news__img-box">
                                    <a href="posts" class="blog-news__img--link">
                                        <img src="{{ asset($post->image) }}" alt="" class="blog-news__img">
                                    </a>
                                </div>
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
                                <div class="blog-news__archive m-t-25">
                                    <a href="#" class="blog-news__postdate"><i
                                            class="far fa-calendar"></i> {{ $date }}</a>
                                    <a href="#" class="blog-news__author"><i
                                            class="far fa-user"></i> {{ $post->author }}</a>
                                </div>
                                <a href="posts" class="blog-news__link">
                                    <h5>{{ $post->title }}</h5>
                                </a>
                            </div> <!-- End Blog News Item -->
                        @endforeach
                    </div>
                    <div class="swiper-buttons">
                        <!-- Add Arrows -->
                        <div class="swiper-button-next default__nav default__nav--next"><i
                                class="fal fa-chevron-right"></i></div>
                        <div class="swiper-button-prev default__nav default__nav--prev"><i
                                class="fal fa-chevron-left"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End  Blog News   ::::::  -->
