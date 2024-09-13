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
                            <table class="table table-vcenter table-mobile-md card-table">
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
                                                           href="{{ route('product', ['id' => $product->id]) }}">
                                                            Открыть
                                                        </a>
                                                        <form id="delete-form-{{ $product->id }}"
                                                              action="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                                              method="post">
                                                            @csrf
                                                            <button type="button" class="dropdown-item"
                                                                    onclick="confirmDelete({{ $product->id }})">
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
    <script>
        function confirmDelete(productId) {
            if (confirm('Вы уверены, что хотите удалить этот продукт?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
@endsection
