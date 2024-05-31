@extends('admin/common/layout')
@section('title')
    Главная
@endsection

@section('main_content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Отзывы
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Отзывы</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">№
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick"
                                             width="24"
                                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M6 15l6 -6l6 6"/>
                                        </svg>
                                    </th>
                                    <th>Товар</th>
                                    <th>Покупатель</th>
                                    <th>Оценка</th>
                                    <th>Текст</th>
                                    <th>Статус</th>
                                    <th>Время</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>
                                            <span class="text-secondary">{{ $review->id }}</span>
                                        </td>
                                        <td>
                                            {{ $review->product->name ?? null }}
                                        </td>
                                        <td>
                                            {{ $review->user->name ?? null }}
                                        </td>
                                        <td>
                                            {{ $review->stars ?? null }}
                                            <span class="gl-star-rating gl-star-rating--ltr" data-star-rating="">
                                                <span class="gl-star-rating--stars" data-rating="5">
                                                    @for ($i = 1; $i <= $review->stars; $i++)
                                                        <span data-index="{{ $i }}" data-value="1" class="gl-active">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="icon gl-star-full text-primary icon-3"
                                                                 width="24"
                                                                 height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                 stroke="currentColor" fill="none"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round" style="pointer-events: none;">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                      fill="none"></path>
                                                                <path
                                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                                    stroke-width="0"
                                                                    fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    @endfor
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            {{ $review->text ?? null }}
                                        </td>
                                        <td>
                                            @if($review->status == 1)
                                                <span class="badge bg-success me-1"></span>
                                            @else
                                                <span class="badge bg-danger me-1"></span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $datetime = $review->created_at;
                                                $dateTimeObj = new DateTime($datetime);
                                                $date = $dateTimeObj->format('d.m.y');
                                                $time = $dateTimeObj->format('H:i');
                                            @endphp
                                            {{ $date }}
                                            <br>
                                            {{ $time }}
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                @if($review->status == 0)
                                                    <form
                                                        action="{{ route('admin.product.review.on', parameters: ['id' => $review->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            Включить
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.product.review.off', parameters: ['id' => $review->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            Отключить
                                                        </button>
                                                    </form>
                                                @endif
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        Действия
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <form
                                                            action="{{ route('admin.product.review.delete', parameters: ['id' => $review->id]) }}"
                                                            method="post">
                                                            <button type="submit" class="dropdown-item">
                                                                Удалить
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="#">
                                                            Изменить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span>
                                entries</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M15 6l-6 6l6 6"/>
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M9 6l6 6l-6 6"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
