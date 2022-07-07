@extends('layouts.main')
@section('content')

    <table class="table table-bordered">
        <h1>Список всех товаров</h1>
        <div style="display: flex; justify-content: space-between; width: 200px;">
            <a href="{{route('parsing')}}">ПАРСИНГ</a>
            <a href="{{route('publishedGoods')}}">ОПУБЛИКОВАТЬ</a>
        </div>
        <div style="width: 30px; height: 30px;"></div>
        <a href="{{route('createGood')}}">Добавить</a>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
            <th style="border: 2px solid black">table_id</th>
            <th style="border: 2px solid black">name</th>
            <th style="border: 2px solid black">price</th>
            <th style="border: 2px solid black">info</th>
            <th style="border: 2px solid black">counter</th>
            <th style="border: 2px solid black">category</th>
            <th style="border: 2px solid black">brand</th>
            <th style="border: 2px solid black">designer</th>
            <th style="border: 2px solid black">size</th>
            <th style="border: 2px solid black">sale</th>
            <th style="border: 2px solid black">img</th>
        </tr>
        </thead>
        <tbody>
        @forelse($goods as $good)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('showGood', ['id' => $good->id])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $good->table_id }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->price }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->info }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->counter }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->category }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->brand }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->designer }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->size }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->sale }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->img }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
