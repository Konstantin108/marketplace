@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Добавление новой записи</h1>
                @if($errors->any())
                    <div class="alert alert-danger">Необходимо заполнить все поля</div>
                @endif
                <form method="post" action="{{ route('storeGood') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">img</label>
                        <input type="file" id="img" name="img" class="form-control" style="width: 500px;">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="table_id">table_id</label>
                        <input type="number"
                               id="table_id"
                               name="table_id"
                               @error('table_id') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('table_id')}}">
                        @if($errors->has('table_id'))
                            @foreach($errors->get('table_id') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="name">name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               @error('name') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('name')}}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">category</label>
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
                        <label for="price">price</label>
                        <input type="text"
                               id="price"
                               name="price"
                               class="form-control"
                               value="{{old('price')}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="info">info</label>
                        <input type="text"
                               id="info"
                               name="info"
                               class="form-control"
                               value="{{old('info')}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="counter">counter</label>
                        <input type="text"
                               id="counter"
                               name="counter"
                               class="form-control"
                               value="{{old('counter')}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="brand">brand</label>
                        <input type="text"
                               id="brand"
                               name="brand"
                               class="form-control"
                               value="{{old('brand')}}">
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="designer">designer</label>
                        <input type="text"
                               id="designer"
                               name="designer"
                               class="form-control"
                               value="{{old('designer')}}">
                    </div>
                    <div class="form-group">
                        <label for="size">size</label>
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
                        <label for="sale">sale</label>
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
                <a href="{{route('goods')}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
