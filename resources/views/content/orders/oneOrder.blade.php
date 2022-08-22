@extends('layouts.site')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <form method="post"
          action="{{ route('updateOrderStatus', ['id' => $order->id])}}"
          enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <h1>Заказ №{{ $order->id }}</h1>
            <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
            <tr style="border: 2px solid black">
                <th style="border: 2px solid black">#ID</th>
                <th style="border: 2px solid black">Количество товаров</th>
                <th style="border: 2px solid black">Товары</th>
                <th style="border: 2px solid black">Сумма</th>
                <th style="border: 2px solid black">Статус</th>
                <th style="border: 2px solid black">Дата создания</th>
            </tr>
            </thead>
            <tbody>
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $order->count }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    @forelse($goodsInOrder as $good)
                        <a href="{{route('siteOneGood', [
                                                    'id' => $good->id,
                                                    'tableId' => $good->table_id,
                                                    'link' => 3,
                                                    'orderId' => $order->id
                                                    ])}}">
                            {{ $good->name }}
                        </a>
                        {{ $good->price }}&#8381; {{$good->counter }}шт.<br>
                    @empty
                        <p>нет данных</p>
                    @endforelse
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->sum }}&#8381;</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    @if($order->status == 'ожидает подтверждения')
                        <select id="status" name="status">
                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                            <option value="заказ отменён">
                                отменить заказ
                            </option>
                        </select>
                        <button type="submit" class="btn btn-success">сохранить</button>
                    @else
                        {{ $order->status }}
                    @endif
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->created_at->format('Y:m:d') }}</td>
            </tr>
            </tbody>
        </table>
    </form>
    <a href="{{route('allMyOrders')}}">Назад</a>

@endsection
