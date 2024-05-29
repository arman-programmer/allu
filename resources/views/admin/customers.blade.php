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
                        Покупатели
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
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Город</th>
                                    <th>Телефон</th>
                                    <th>Адрес</th>
                                    <th>Зарегистрирован</th>
                                    <th>Был в сети</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Арман Беркут</td>
                                    <td class="text-secondary">Алматы</td>
                                    <td>+77719093655</td>
                                    <td class="text-secondary">Аль-Фараби, 100</td>
                                    <td>15.05.2024</td>
                                    <td class="text-secondary">1 день назад</td>
                                    <td><a href="#">Изменить</a></td>
                                </tr>
                                <tr>
                                    <td>Арман Беркут</td>
                                    <td class="text-secondary">Алматы</td>
                                    <td>+77719093655</td>
                                    <td class="text-secondary">Аль-Фараби, 100</td>
                                    <td>15.05.2024</td>
                                    <td class="text-secondary">1 день назад</td>
                                    <td><a href="#">Изменить</a></td>
                                </tr>
                                <tr>
                                    <td>Арман Беркут</td>
                                    <td class="text-secondary">Алматы</td>
                                    <td>+77719093655</td>
                                    <td class="text-secondary">Аль-Фараби, 100</td>
                                    <td>15.05.2024</td>
                                    <td class="text-secondary">1 день назад</td>
                                    <td><a href="#">Изменить</a></td>
                                </tr>
                                <tr>
                                    <td>Арман Беркут</td>
                                    <td class="text-secondary">Алматы</td>
                                    <td>+77719093655</td>
                                    <td class="text-secondary">Аль-Фараби, 100</td>
                                    <td>15.05.2024</td>
                                    <td class="text-secondary">1 день назад</td>
                                    <td><a href="#">Изменить</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
