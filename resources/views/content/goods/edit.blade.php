@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Артикул №{{$good->table_id}} - редактирование данных</h1>
                @if($errors->any())
                    <div class="alert alert-danger">Необходимо заполнить все поля</div>
                @endif
                <form method="post" action="{{ route('update', ['id' => $good->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">Изображение товара</label>
                        <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
                        >
                            @if($good->img)
                                <img src="{{ \Storage::disk('public')->url( $good->img) }}" alt="img"
                                     style="width: 200px;">
                                <input type="hidden" id="img" name="img" value="{{ $good->img }}">
                            @else
                                <img src="/img/no_photo.jpg" alt="img" style="width: 200px;">
                            @endif
                        </div>
                        <input type="file" id="img" name="img" class="form-control" style="width: 500px;">
                    </div>
                    <input type="hidden"
                           id="table_id"
                           name="table_id"
                           value="{{$good->table_id}}">
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="name">Наименование товара</label>
                        <input type="text"
                               id="name"
                               name="name"
                               @error('name') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{$good->name}}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Категория товара</label>
                        <br>
                        <select
                            class="form-control"
                            id="category"
                            @error('category')
                            style="border: red 1px solid;"
                            @enderror
                            name="category"
                        >
                            <option value="">Выберете категорию</option>
                            <option value="{{'Аксессуары'}}">
                                Аксессуары
                            </option>
                            <option value="{{'Сумки'}}">
                                Сумки
                            </option>
                            <option value="{{'Джинсовая ткань'}}">
                                Джинсовая ткань
                            </option>
                            <option value="{{'Толстовки с капюшоном и свитера'}}">
                                Толстовки с капюшоном и свитера
                            </option>
                            <option value="{{'Куртки и пальто'}}">
                                Куртки и пальто
                            </option>
                            <option value="{{'Брюки'}}">
                                Брюки
                            </option>
                            <option value="{{'Поло'}}">
                                Поло
                            </option>
                            <option value="{{'Рубашки'}}">
                                Рубашки
                            </option>
                            <option value="{{'Обувь'}}">
                                Обувь
                            </option>
                            <option value="{{'Шорты'}}">
                                Шорты
                            </option>
                            <option value="{{'Свитера и трикотаж'}}">
                                Свитера и трикотаж
                            </option>
                            <option value="{{'Футболки'}}">
                                Футболки
                            </option>
                        </select>
                        @if($errors->has('category'))
                            @foreach($errors->get('category') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="price">Цена в рублях</label>
                        <input type="text"
                               id="price"
                               name="price"
                               class="form-control"
                               value="{{$good->price}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="info">Информация о товаре</label>
                        <input type="text"
                               id="info"
                               name="info"
                               class="form-control"
                               value="{{$good->info}}">
                    </div>
                    <div class="form-group">
                        <label for="sex">Пол</label>
                        <br>
                        <select
                            class="form-control"
                            id="sex"
                            @error('sex')
                            style="border: red 1px solid;"
                            @enderror
                            name="sex"
                        >
                            <option value="М">
                                Для мужчин
                            </option>
                            <option value="Ж">
                                Для женщин
                            </option>
                        </select>
                        @if($errors->has('sex'))
                            @foreach($errors->get('sex') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="brand">Бренд</label>
                        <input type="text"
                               id="brand"
                               name="brand"
                               class="form-control"
                               value="{{$good->brand}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="designer">Дизайнер</label>
                        <input type="text"
                               id="designer"
                               name="designer"
                               class="form-control"
                               value="{{$good->designer}}">
                    </div>
                    <div class="form-group">
                        <label for="size">Размер</label>
                        <br>
                        <select
                            class="form-control"
                            id="size"
                            @error('size')
                            style="border: red 1px solid;"
                            @enderror
                            name="size"
                        >
                            <option value="">Выберете размер</option>
                            <option value="{{'XXS'}}">
                                XXS
                            </option>
                            <option value="{{'XS'}}">
                                XS
                            </option>
                            <option value="{{'S'}}">
                                S
                            </option>
                            <option value="{{'M'}}">
                                M
                            </option>
                            <option value="{{'L'}}">
                                L
                            </option>
                            <option value="{{'XL'}}">
                                XL
                            </option>
                            <option value="{{'XXL'}}">
                                XXL
                            </option>
                        </select>
                        @if($errors->has('size'))
                            @foreach($errors->get('size') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sale">Акция</label>
                        <br>
                        <select
                            class="form-control"
                            id="sale"
                            @error('sale')
                            style="border: red 1px solid;"
                            @enderror
                            name="sale"
                        >
                            <option value="0">
                                Скидка отсутствует
                            </option>
                            <option value="1">
                                Скидка действует
                            </option>
                        </select>
                        @if($errors->has('sale'))
                            @foreach($errors->get('sale') as $error)
                                <span
                                    style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
                <a href="{{route('showGood', ['id' => $good->id])}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
