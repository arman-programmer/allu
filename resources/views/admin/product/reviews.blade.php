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
                                        </td>
                                        <td>
                                            {{ $review->text ?? null }}
                                        </td>
                                        <td>
                                            {{ $review->status ?? null }}
                                        </td>
                                        <td>
                                            {{ $review->created_at ?? null }}
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn">
                                                    Edit
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
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
