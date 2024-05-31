<!-- Start Leftside - Sidebar -->
<div class="col-lg-3">
    <div class="sidebar">
        <!-- Start Single Sidebar Widget -->
        <div class="sidebar__widget gray-bg">
            <div class="sidebar__box">
                <h5 class="sidebar__title">Поиск по постам</h5>
            </div>
            <div class="sidebar__search">
                <form action="{{ route('posts.search') }}" method="get" class="form-box__single-group">
                    @csrf
                    <div class="d-flex">
                        <input class="form-control" name="search" type="search" placeholder="Введите ключевое слово">
                        <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit"><i
                                class="fal fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div> <!-- End Single Sidebar Widget -->
        <!-- Start Single Sidebar Widget -->
        <div class="sidebar__widget gray-bg d-lg-block d-none">
            <div class="sidebar__box">
                <h5 class="sidebar__title">Популярные посты</h5>
            </div>
            <ul class="sidebar__post list-space--medium">
                @foreach ($random as $post)
                    <li class="d-flex align-items-center">
                        <a class="sidebar__post-img" href="{{ route('post', $post->id) }}">
                            <div class="img-responsive">
                                <img src="{{ $post->image }}" alt="">
                            </div>
                        </a>
                        <div class="sidebar__post-content">
                            <a class="link--gray" href="{{ route('post', $post->id) }}">{{ $post->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div> <!-- End Single Sidebar Widget -->
    </div>
</div> <!-- End Left Sidebar -->
