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
                        Категории
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                           data-bs-target="#modal-report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                            Новая категория
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
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Продуктов</th>
                                    <th>Родитель</th>
                                    <th>Статус</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                @if($category->thumb)
                                                    <span class="avatar me-2"
                                                          style="background-image: url('{{ $category->thumb }}')"></span>
                                                @else
                                                    <span class="avatar me-2"
                                                          style="background-image: url('{{ asset('assets/placeholder.svg') }}')"></span>
                                                @endif
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium"> {{ $category->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $category->products_count }} шт.
                                        </td>
                                        <td>
                                            @if($category->subCategory)
                                                <div>{{ $category->subCategory->name }}</div>
                                            @endif
                                        </td>
                                        <td class="text-secondary">
                                            @if($category->status == 1)
                                                <span class="badge bg-success me-1"></span>
                                                Активен
                                            @else
                                                <span class="badge bg-danger me-1"></span>
                                                Выкл
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Действия
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('products.category', ['id' => $category->id]) }}">
                                                            Открыть
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Удалить
                                                        </a>
                                                        @if($category->status == 1)
                                                            <form
                                                                action="{{ route('admin.category.off', ['id' => $category->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">
                                                                    Отключить
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.category.on', ['id' => $category->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">
                                                                    Включить
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
