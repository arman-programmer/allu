@extends('admin.common.layout')
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
                        Настройки товара
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
                    <form action="{{ route('admin.product.edit.save', ['id' => $product->id]) }}" method="post"
                          class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">
                                <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-5">
                                <div class="col-xl-6">
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="form-label">Имя </label>
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ $product->name }}">
                                            <div class="mb-3">
                                                <label class="form-label">Наличие </label>
                                                <input name="stock" type="text" class="form-control"
                                                       value="{{ $product->stock ?? null }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Город </label>
                                            <div class="form-selectgroup">
                                                @foreach($cities as $city)
                                                    @if($city->id == $product->city_id)
                                                        <label class="form-selectgroup-item">
                                                            <input type="radio" name="city"
                                                                   value="{{ $city->id }}"
                                                                   class="form-selectgroup-input" checked>
                                                            <span
                                                                class="form-selectgroup-label">{{ $city->name }}</span>
                                                        </label>
                                                    @else
                                                        <label class="form-selectgroup-item">
                                                            <input type="radio" name="city"
                                                                   value="{{ $city->id }}"
                                                                   class="form-selectgroup-input">
                                                            <span
                                                                class="form-selectgroup-label">{{ $city->name }}</span>
                                                        </label>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание </label>
                                        <textarea name="description" class="form-control"
                                                  data-bs-toggle="autosize">{{ $product->description ?? null }}</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label class="form-label">Цена </label>
                                            <input name="price" type="text" class="form-control"
                                                   value="{{ $product->price ?? null }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Старая цена </label>
                                            <input name="old_price" type="text" class="form-control"
                                                   value="{{ $product->old_price ?? null }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Факт цена </label>
                                            <input name="fact_price" type="text" class="form-control"
                                                   value="{{ $product->fact_price ?? null }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <div class="form-label">Категория</div>
                                            <select name="category" class="form-select">
                                                @if($product->category)
                                                    <option
                                                        value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                                @else
                                                    <option value="">--не выбрано--</option>
                                                @endif
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label">Страна</div>
                                            <select name="country" class="form-select">
                                                @if($product->country)
                                                    <option
                                                        value="{{ $product->country->id }}">{{ $product->country->name }}</option>
                                                @endif
                                                <option value="">--не выбрано--</option>
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label">Производитель</div>
                                            <select name="manufacturer" class="form-select">
                                                @if($product->manufacturer)
                                                    <option
                                                        value="{{ $product->manufacturer->id }}">{{ $product->manufacturer->name }}</option>
                                                @else
                                                    <option value="">--не выбрано--</option>
                                                @endif
                                                @foreach($manufacturers as $manufacturer)
                                                    <option
                                                        value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-3">
                                            <label class="form-label">Длина </label>
                                            <input name="length" type="text" class="form-control"
                                                   value="{{ $product->size->length ?? null }}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Ширина </label>
                                            <input name="width" type="text" class="form-control"
                                                   value="{{ $product->size->width ?? null }}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Высота </label>
                                            <input name="height" type="text" class="form-control"
                                                   value="{{ $product->size->height ?? null }}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Вес </label>
                                            <input name="weight" type="text" class="form-control"
                                                   value="{{ $product->size->weight ?? null }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="divide-y">
                                            <div>
                                                <label class="row">
                                                    <span class="col">Включить</span>
                                                    <span class="col-auto">
                                                      <label class="form-check form-check-single form-switch">
                                                          <input type="hidden" name="status" value="0">
                                                          <input name="status" class="form-check-input" type="checkbox"
                                                                 value="1"
                                                                 @if($product->status == 1)
                                                                     checked
                                                                 @endif
                                                          >
                                                      </label>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="input-container" class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Атрибут </label>
                                            @foreach($product->details as $detail)
                                                <input name="attr{{ $loop->iteration }}"
                                                       type="text"
                                                       class="form-control mb-1"
                                                       value="{{ $detail->name }}">
                                                @if($loop->last)
                                                    <input name="attr{{ $loop->iteration + 1 }}"
                                                           type="text"
                                                           class="form-control mb-1">
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Значение </label>
                                            @foreach($product->details as $detail)
                                                <input name="val{{ $loop->iteration }}"
                                                       type="text"
                                                       class="form-control mb-1"
                                                       value="{{ $detail->value }}">
                                                @if($loop->last)
                                                    <input name="val{{ $loop->iteration + 1 }}"
                                                           type="text"
                                                           class="form-control mb-1">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label">Выбрать главного </label>
                                    <div class="mb-3">
                                        <div id="photoGallery" class="row g-2 g-md-3">

                                        </div>
                                        <div class="row g-2 g-md-3">
                                            @foreach($product->images as $image)
                                                <div class="col-6">
                                                    <a data-fslightbox="gallery"
                                                       href="{{ $image->link }}">
                                                        <div class="img-responsive img-responsive-1x1 rounded-3 border"
                                                             style="background-image: url({{ $image->link }})"></div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('admin.products') }}" class="btn btn-link">Отмена</a>
                                <button type="submit" class="btn btn-primary ms-auto">Сохранить</button>
                            </div>
                        </div>
                    </form>
                    <form id="uploadForm" enctype="multipart/form-data" class="mb-3 mt-3">
                        <input type="file" name="file" id="file" class="form-control">
                    </form>
                    <div id="progressBar"
                         style="width: 100%; background-color: #f3f3f3; height: 20px; border-radius: 5px; overflow: hidden;">
                        <div id="progressBarFill" style="width: 0%; height: 100%; background-color: #4caf50;"></div>
                    </div>
                    <div id="uploadStatus"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('file').addEventListener('change', function () {
            var fileInput = document.getElementById('file');
            var formData = new FormData();
            formData.append('file', fileInput.files[0]);

            var xhr = new XMLHttpRequest();

            // Обновление прогресс-бара
            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    document.getElementById('progressBarFill').style.width = percentComplete + '%';
                }
            }, false);

            // Обработка успешного ответа
            xhr.addEventListener('load', function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        document.getElementById('uploadStatus').innerHTML = 'Файл успешно загружен.';

                        // Добавление нового изображения в галерею
                        var photoGallery = document.getElementById('photoGallery');
                        var newPhotoHtml = `
                    <div class="col-6">
                        <a data-fslightbox="gallery" href="${response.file}">
                            <div class="img-responsive img-responsive-1x1 rounded-3 border"
                                 style="background-image: url(${response.file})"></div>
                        </a>
                        <input type="hidden" name="image-${Date.now()}" value="${response.file}">
                    </div>
                `;
                        photoGallery.insertAdjacentHTML('beforeend', newPhotoHtml);

                        // Обновление lightbox для новой фотографии
                        refreshFsLightbox();

                    } else {
                        document.getElementById('uploadStatus').innerHTML = 'Ошибка: ' + response.error;
                    }
                } else {
                    document.getElementById('uploadStatus').innerHTML = 'Ошибка загрузки файла.';
                }
            });

            // Обработка ошибок
            xhr.addEventListener('error', function () {
                document.getElementById('uploadStatus').innerHTML = 'Ошибка при отправке запроса.';
            });

            // Настройка запроса
            xhr.open('POST', '{{ route('upload.file') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

            // Отправка данных
            xhr.send(formData);
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('input-container');
            const inputs = container.querySelectorAll('input');
            let index = inputs.length / 2;

            if (inputs.length === 0 || !inputs[inputs.length - 1].value.trim()) {
                // Создаем новое поле, если нет ни одного поля или последнее поле пустое
                const newAttrDiv = document.createElement('div');
                newAttrDiv.className = 'col-6';
                newAttrDiv.innerHTML = `
            <input name="attr${index}" type="text" class="form-control mb-1">
        `;

                const newValDiv = document.createElement('div');
                newValDiv.className = 'col-6';
                newValDiv.innerHTML = `
            <input name="val${index}" type="text" class="form-control mb-1">
        `;

                container.appendChild(newAttrDiv);
                container.appendChild(newValDiv);
            }

            container.addEventListener('input', function (e) {
                const inputs = container.querySelectorAll('input');
                const lastAttr = inputs[inputs.length - 2];
                const lastVal = inputs[inputs.length - 1];

                index = inputs.length / 2;
                if (lastAttr.value.trim() !== '' && lastVal.value.trim() !== '') {
                    index++;
                    const newAttrDiv = document.createElement('div');
                    newAttrDiv.className = 'col-6';
                    newAttrDiv.innerHTML = `
                <input name="attr${index}" type="text" class="form-control mb-1">
            `;

                    const newValDiv = document.createElement('div');
                    newValDiv.className = 'col-6';
                    newValDiv.innerHTML = `
                <input name="val${index}" type="text" class="form-control mb-1">
            `;

                    container.appendChild(newAttrDiv);
                    container.appendChild(newValDiv);
                }
            });
        });

    </script>
@endsection
