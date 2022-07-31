@extends('layouts.site')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <table class="table table-bordered">
        <h1>Корзина</h1>
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
            <th style="border: 2px solid black; width: 60px;">img</th>
        </tr>
        </thead>
        <tbody>
        @forelse($goodsInBasket as $goodInBasket)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('siteOneGood', [
                                                    'id' => $goodInBasket->id,
                                                    'tableId' => $goodInBasket->table_id,
                                                    'link' => 2
                                                    ])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $goodInBasket->table_id }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->price }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->info }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('delFromBasket',[
                                                      'id' => $goodInBasket->id,
                                                      'tableId' => $goodInBasket->table_id,
                                                      'link' => 2
                                                      ])}}">
                        <i class="fas fa-minus" style="cursor: pointer"></i>
                    </a>
                    {{ $goodInBasket->counter }}
                    <a href="{{route('addToBasket', [
                                                     'id' => $goodInBasket->id,
                                                     'tableId' => $goodInBasket->table_id,
                                                     'link' => 2
                                                     ])}}">
                        <i class="fas fa-plus" style="cursor: pointer"></i>
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->category }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->brand }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->designer }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->size }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $goodInBasket->sale }}</td>
                <td style="width: 60px; border-bottom: 2px solid black; border-right: 1px solid black">
                    @if($goodInBasket->img)
                        <img src="{{ \Storage::disk('public')->url( $goodInBasket->img) }}" alt="avatar"
                             style="width: 50px; border-radius: 50%">
                    @else
                        <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
