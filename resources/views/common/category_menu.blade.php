<!-- Start Menu Content -->
<div class="header-menu-vertical d-lg-block d-none">
    <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i> Каталог</h4>
    <ul class="menu-content">
        @foreach ($categories as $category)
            @if (empty($category->sub))
                <li class="menu-item"><a
                        href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div> <!-- End Menu Content -->
