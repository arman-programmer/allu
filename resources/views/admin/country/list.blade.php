@extends('admin.common.layout')
@section('title')
    Страны
@endsection

@section('main_content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Страны
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.country.add') }}" class="btn btn-primary d-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                            Новый товар
                        </a>
                    </div>
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
                            <h3 class="card-title">Страны</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Товаров</th>
                                    <th>Последнее изменение</th>
                                    <th>Дата создания</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($countries as $country)
                                    <tr>
                                        <td>
                                            <span class="text-secondary">{{ $country->id }}</span>
                                        </td>
                                        <td>
                                            {{ $country->name ?? null }}
                                        </td>
                                        <td>
                                            {{ $country->products->count() ?? null }}
                                        </td>
                                        <td>
                                            @php
                                                $datetime = $country->updated_at;
                                                $dateTimeObj = new DateTime($datetime);
                                                $date = $dateTimeObj->format('d.m.y');
                                                $time = $dateTimeObj->format('H:i');
                                            @endphp
                                            {{ $date }}
                                            <br>
                                            {{ $time }}
                                        </td>
                                        <td>
                                            @php
                                                $datetime = $country->created_at;
                                                $dateTimeObj = new DateTime($datetime);
                                                $date = $dateTimeObj->format('d.m.y');
                                                $time = $dateTimeObj->format('H:i');
                                            @endphp
                                            {{ $date }}
                                            <br>
                                            {{ $time }}
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    Действия
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <form
                                                        action="{{ route('admin.country.delete', parameters: ['id' => $country->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                    <a class="dropdown-item" href="#">
                                                        Изменить
                                                    </a>
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
