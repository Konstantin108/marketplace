@extends('layouts.main')
@section('content')


<table class="table table-bordered">
    <h1>Артикул №{{$good->table_id}}</h1>
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
        <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->id }}</td>
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
    </tbody>

</table>


<a href="{{route('edit', ['id' => $good->id])}}">Редактировать</a>
<a href="{{ route('delete', ['id' => $good->id]) }}">Удалить</a>
<a href="{{route('goods')}}">Назад</a>


@endsection
