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
                    <form action="{{ route('admin.product.edit.save', ['id' => 'new']) }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">
                                <p>Новый товар</p>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-5">
                                <div class="col-xl-6">
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="form-label">Имя </label>
                                            <input name="name" type="text" class="form-control"
                                                   placeholder="Название товара">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Город </label>
                                            <div class="form-selectgroup">
                                                @foreach($cities as $city)
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" name="city"
                                                               value="{{ $city->id }}"
                                                               class="form-selectgroup-input">
                                                        <span
                                                            class="form-selectgroup-label">{{ $city->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание </label>
                                        <textarea name="description" class="form-control" data-bs-toggle="autosize"
                                                  placeholder="Описание товара">
                                        </textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label class="form-label">Цена </label>
                                            <input name="price" type="text" class="form-control"
                                                   placeholder="Цена товара">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Наличие </label>
                                            <input name="stock" type="text" class="form-control"
                                                   placeholder="Количество">
                                        </div>
                                        <div class="col-4">
                                            <div class="form-label">Категория</div>
                                            <select name="category" class="form-select">
                                                <option value="">--не выбрано--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-label">Страна</div>
                                            <select name="country" class="form-select">
                                                <option value="">--не выбрано--</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label">Производитель</div>
                                            <select name="manufacturer" class="form-select">
                                                <option value="">--не выбрано--</option>
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
                                                   placeholder="Длина">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Ширина </label>
                                            <input name="width" type="text" class="form-control"
                                                   placeholder="Ширина">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Высота </label>
                                            <input name="height" type="text" class="form-control"
                                                   placeholder="Высота">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Вес </label>
                                            <input name="weight" type="text" class="form-control"
                                                   placeholder="Вес">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="divide-y">
                                            <div>
                                                <label class="row">
                                                    <span class="col">Включить</span>
                                                    <span class="col-auto">
                                                      <label class="form-check form-check-single form-switch">
                                                          <input name="status" type="hidden" value="0">
                                                          <input name="status" class="form-check-input" type="checkbox"
                                                                 value="1">
                                                      </label>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="input-container" class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Атрибут </label>
                                            <input name="attr1"
                                                   type="text"
                                                   class="form-control mb-1"
                                                   placeholder="Атрибут">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Значение </label>
                                            <input name="val1"
                                                   type="text"
                                                   class="form-control mb-1"
                                                   placeholder="Значение">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label">Выбрать главного </label>
                                        <div class="row g-2" id="imageContainer">

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
                    <div id="progressBar">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#uploadForm').on('change', function (e) {
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: '{{ route('upload.file') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    xhr: function () {
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            if (e.lengthComputable) {
                                let percentComplete = e.loaded / e.total * 100;
                                $('#progressBar div').width(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        let imageCount = $('.form-imagecheck-input').length + 1;

                        let newDiv = $('<div>', {class: 'col-6 col-sm-4'});
                        let newLabel = $('<label>', {class: 'form-imagecheck mb-2'});
                        let newInputRadio = $('<input>', {
                            name: 'thumb_id',
                            type: 'radio',
                            value: imageCount,
                            class: 'form-imagecheck-input'
                        });
                        let newInputHidden = $('<input>', {
                            type: 'hidden',
                            name: 'image-' + imageCount,
                            value: '/storage/' + response.file
                        });
                        let newSpan = $('<span>', {class: 'form-imagecheck-figure'});
                        let newImg = $('<img>', {
                            src: '/storage/' + response.file,
                            alt: 'Uploaded Image',
                            class: 'form-imagecheck-image'
                        });

                        newSpan.append(newImg);
                        newLabel.append(newInputRadio).append(newSpan);
                        newDiv.append(newLabel).append(newInputHidden);
                        $('#imageContainer').append(newDiv);
                    },
                    error: function (response) {
                        alert("Ошибка при закгрузке");
                    }
                });
            });
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
            <input name="attr${index}" type="text" class="form-control mb-1" placeholder="Атрибут">
        `;

                const newValDiv = document.createElement('div');
                newValDiv.className = 'col-6';
                newValDiv.innerHTML = `
            <input name="val${index}" type="text" class="form-control mb-1" placeholder="Значение">
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
                <input name="attr${index}" type="text" class="form-control mb-1" placeholder="Атрибут">
            `;

                    const newValDiv = document.createElement('div');
                    newValDiv.className = 'col-6';
                    newValDiv.innerHTML = `
                <input name="val${index}" type="text" class="form-control mb-1" placeholder="Значение">
            `;

                    container.appendChild(newAttrDiv);
                    container.appendChild(newValDiv);
                }
            });
        });

    </script>
@endsection
