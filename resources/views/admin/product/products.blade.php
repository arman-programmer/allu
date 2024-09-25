@extends('admin.common.layout')

@section('title')
    Товары
@endsection

@section('main_content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Товары
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.product.add') }}" class="btn btn-primary d-inline-block">
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
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>На складе</th>
                                    <th>Статус</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                               class="d-flex py-1 align-items-center">
                                                @if($product->images->isNotEmpty() && $product->images->first())
                                                    <span class="avatar me-2"
                                                          style="background-image: url('{{ $product->images->first()->link }}')">
                                                    </span>
                                                @else
                                                    <span class="avatar me-2"
                                                          style="background-image: url('{{ asset('assets/placeholder.svg') }}')">
                                                    </span>
                                                @endif
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium"> {{ $product -> name }}</div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            @if($product->category)
                                                <a href="{{ route('products.category', ['id' => $product->category->id]) }}">
                                                    {{ $product->category->name }}
                                                </a>
                                            @else
                                                <div>Хуния</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->stock >= 10)
                                                <span class="badge bg-success me-1"></span>
                                            @elseif($product->stock != 0)
                                                <span class="badge bg-warning me-1"></span>
                                            @else
                                                <span class="badge bg-danger me-1"></span>
                                            @endif
                                            {{ $product->stock }}
                                        </td>
                                        <td class="text-secondary">
                                            @if($product->status == 1)
                                                <span class="badge bg-success me-1"></span>
                                                Активен
                                            @else
                                                <span class="badge bg-danger me-1"></span>
                                                Выключен
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
                                                           href="{{ route('product', ['id' => $product->id]) }}"
                                                           target="_blank">
                                                            Перейти
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                                           target="_blank">
                                                            Редактировать
                                                        </a>
                                                        <form id="delete-form" action="#" method="post">
                                                            @csrf
                                                            <button type="button" class="dropdown-item"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modal-danger"
                                                                    onclick="setDeleteRoute('{{ route('admin.product.delete', ['id' => $product->id]) }}')">
                                                                Удалить
                                                            </button>
                                                        </form>
                                                        @if($product->status == 1)
                                                            <form
                                                                action="{{ route('admin.product.off', ['id' => $product->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">
                                                                    Отключить
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.product.on', ['id' => $product->id]) }}"
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
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"/>
                        <path d="M12 9v4"/>
                        <path d="M12 17h.01"/>
                    </svg>
                    <h3>Вы уверены?</h3>
                    <div class="text-secondary">Вы действительно хотите удалить продукт
                        <br/><span id="product-name"></span>?
                        <br/>
                        Это действие нельзя будет отменить.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn w-100" data-bs-dismiss="modal">Отмена</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger w-100" id="confirm-delete-btn">Удалить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let deleteRoute = null;

        function setDeleteRoute(route) {
            deleteRoute = route;
        }

        document.getElementById('confirm-delete-btn').addEventListener('click', function () {
            if (deleteRoute) {
                document.getElementById('delete-form').action = deleteRoute;
                document.getElementById('delete-form').submit();
            }
        });
    </script>
@endsection
