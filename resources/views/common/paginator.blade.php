<!-- Start Pagination -->
<div class="page-pagination">
    @if ($paginator->hasPages())
    @if ($paginator->count() == 1)
    <span>Отображается {{ $paginator->count() }} результат из {{ $paginator->total() }}.</span>
    @else
    <span>Отображаются {{ $paginator->count() }} результатов из {{ $paginator->total() }}.</span>
    @endif
    <ul class="page-pagination__list">
        @if ($paginator->onFirstPage())
        <li class="page-pagination__item"><a class="page-pagination__link active btn btn--gray">1</a></li>
        @else
        <li class="page-pagination__item">
            <a class="page-pagination__link btn btn--gray" href="{{ $paginator->previousPageUrl() }}"><i class="icon-chevron-left"></i> Назад</a>
        </li>
        <li class="page-pagination__item"><a class="page-pagination__link btn btn--gray" href="{{ $paginator->url(1) }}">1</a></li>
        <li class="page-pagination__item"><a class="page-pagination__link active btn btn--gray">{{ $paginator->currentPage() }}</a></li>
        @endif
        @if ($paginator->lastPage() != $paginator->currentPage())
        <li class="page-pagination__item"><a class="page-pagination__link btn btn--gray" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        <li class="page-pagination__item">
            <a class="page-pagination__link btn btn--gray" href="{{ $paginator->nextPageUrl() }}"> Вперед<i class="icon-chevron-right"></i></a>
        </li>
        @endif
    </ul>
    @else
    @if ($paginator->count() == 1)
    <span> Отображается весь {{ $paginator->count() }} результат.</span>
    @else
    <span> Отображаются все {{ $paginator->count() }} результаты.</span>
    @endif
    @endif
</div>
<!-- End Pagination -->