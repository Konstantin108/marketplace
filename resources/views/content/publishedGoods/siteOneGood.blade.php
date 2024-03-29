@extends('layouts.site')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <table class="table table-bordered">
        <h1>Артикул №{{$publishedGood->table_id}}</h1>
        <thead style="border: 2px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black">ID товара</th>
            <th style="border: 2px solid black">Наименование</th>
            <th style="border: 2px solid black">Цена</th>
            <th style="border: 2px solid black">В корзине</th>
            <th style="border: 2px solid black">Информация</th>
            <th style="border: 2px solid black">Пол</th>
            <th style="border: 2px solid black">Категория</th>
            <th style="border: 2px solid black">Бренд</th>
            <th style="border: 2px solid black">Дизайнер</th>
            <th style="border: 2px solid black">Размер</th>
            <th style="border: 2px solid black">Акция</th>
            <th style="border: 2px solid black; width: 60px;">Фото</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->id }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                {{ $publishedGood->table_id }}
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->name }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->price }}&#8381;
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $count }}шт.</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->info }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->sex }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->category }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->brand }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->designer }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->size }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->sale }}</td>
            <td style="width: 60px; border-bottom: 2px solid black; border-right: 1px solid black">
                @if($publishedGood->img)
                    <img src="{{ \Storage::disk('public')->url( $publishedGood->img) }}" alt="avatar"
                         style="width: 50px; border-radius: 50%">
                @else
                    <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    @if(Auth::check())
        <a href="{{route('addToBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">Добавить в корзину</a>
        <a href="{{route('delFromBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">Убрать из корзины</a>
    @else
        <a href="{{route('addToBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">Авторизуйтесь чтобы купить</a>
    @endif
    <a href="{{route('backForSite', ['link' => $link, 'orderId' => $orderId])}}">Назад</a>

@endsection
