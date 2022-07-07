@extends('layouts.main')
@section('content')


<table class="table table-bordered">
    <h1>Артикул №{{$publishedGood->table_id}}</h1>
    <thead style="border: 2px solid black">
    <tr style="border: 2px solid black">
        <th style="border: 2px solid black">#ID</th>
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
    <tr>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->id }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">
            {{ $publishedGood->table_id }}
        </td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->name }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->price }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->info }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->counter }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->category }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->brand }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->designer }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->size }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->sale }}</td>
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->img }}</td>



    </tr>
    </tbody>

</table>


{{--<a href="{{route('edit', ['id' => $publishedGood->id])}}">Редактировать</a>--}}
{{--<a href="{{ route('delete', ['id' => $publishedGood->id]) }}">Удалить</a>--}}
<a href="{{route('showPublishedGoods')}}">Назад</a>


@endsection
