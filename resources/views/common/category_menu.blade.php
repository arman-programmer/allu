<!-- Start Menu Content -->
<div class="header-menu-vertical d-lg-block d-none">
    <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i> Каталог</h4>
    <ul class="menu-content">
        @foreach ($categories as $category)
            @if (empty($category->sub))
                <li class="menu-item">
                    <a href="{{ route('products.category', $category->id) }}">{{ $category->name }} </a>
                </li>
            @else
                <li class="menu-item">
                    <a href="{{ route('products.category', $category->id) }}">
                        {{ $category->name }}
                        <i class="icon-chevron-right"></i>
                    </a>

                    <ul class="sub-menu sub-menu-2">
                        <li>
                            <ul class="submenu-item">
                                @foreach($category->sub as $subCategory)
                                    <li>
                                        <a href="{{ route('products.category', $subCategory->id) }}">{{ $subCategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</div> <!-- End Menu Content -->

<script>
    /**********************
     * Vertical Menu
     ***********************/
    $('.header-menu-vertical .menu-title').on('click', function (event) {
        $('.header-menu-vertical .menu-content').slideToggle(500);
    });

    $('.menu-content').each(function () {
        var $ul = $(this),
            $lis = $ul.find('.menu-item:gt(12)'),
            isExpanded = $ul.hasClass('expanded');
        $lis[isExpanded ? 'show' : 'hide']();

        if ($lis.length > 0) {
            $ul
                .append($('<li class="expand">' + (isExpanded ? '<a href="javascript:;"><span><i class="icon-minus-square"></i>Скрыть</span></a>' : '<a href="javascript:;"><span><i class="icon-plus-square"></i>Больше категории</span></a>') + '</li>')
                    .on('click', function (event) {
                        var isExpanded = $ul.hasClass('expanded');
                        event.preventDefault();
                        $(this).html(isExpanded ? '<a href="javascript:;"><span><i class="icon-plus-square"></i>Больше категории</span></a>' : '<a href="javascript:;"><span><i class="icon-minus-square"></i>Скрыть</span></a>');
                        $ul.toggleClass('expanded');
                        $lis.toggle(300);
                    }));
        }
    });

</script>
