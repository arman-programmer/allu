<!-- ::::::  Start  Breadcrumb Section  ::::::  -->
<div class="page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="page-breadcrumb__menu">
                    <li class="page-breadcrumb__nav"><a href="{{ route('home') }}">Главная</a></li>
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if (isset($breadcrumb['route']))
                    <li class="page-breadcrumb__nav"><a href="{{ route($breadcrumb['route'], $breadcrumb['parameters'] ?? null) }}">{{ $breadcrumb['title'] }}</a></li>
                    @else
                    <li class="page-breadcrumb__nav">{{ $breadcrumb['title'] }}</li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->