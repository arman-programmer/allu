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
                        Заказы
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
                            <h3 class="card-title">Заказы</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">№
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick"
                                             width="24"
                                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M6 15l6 -6l6 6"/>
                                        </svg>
                                    </th>
                                    <th>Покупатель</th>
                                    <th>Город</th>
                                    <th>Адрес</th>
                                    <th>Телефон</th>
                                    <th>Комментарии</th>
                                    <th>Создан</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <span class="text-secondary">{{ $order->id }}</span>
                                        </td>
                                        <td>
                                            <a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a>
                                        </td>
                                        <td>
                                            <span class="flag flag-xs flag-country-us me-2"></span>
                                            Carlson Limited
                                        </td>
                                        <td>
                                            {{ $order->address }}
                                        </td>
                                        <td>
                                            87956621
                                        </td>
                                        <td>
                                            {{ $order->comment }}
                                        </td>
                                        <td>
                                            @php
                                                $datetime = $order->created_at;
                                                $dateTimeObj = new DateTime($datetime);
                                                $date = $dateTimeObj->format('d.m.y');
                                                $time = $dateTimeObj->format('H:i');
                                            @endphp
                                            {{ $date }}
                                            <br>
                                            {{ $time }}
                                        </td>
                                        <td>
                                            <span class="badge bg-success me-1"></span> {{ $order->status }}
                                        </td>
                                        <td>
                                            $887
                                        </td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                      Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                      Another action
                                                    </a>
                                                </div>
                                            </span>
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
