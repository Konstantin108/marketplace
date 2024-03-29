@extends('layouts.site')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <table class="table table-bordered">
        <h1>Мои заказы</h1>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
            <th style="border: 2px solid black">Количество товаров</th>
            <th style="border: 2px solid black">Сумма</th>
            <th style="border: 2px solid black">Статус</th>
            <th style="border: 2px solid black">Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('getThisOrder', ['id' => $order->id])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $order->count }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->sum }}&#8381;</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->status }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->created_at->format('Y:m:d') }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
