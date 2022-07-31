@extends('layouts.site')
@section('content')

    <table class="table table-bordered">
        <h1>Список товаров</h1>
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
        @forelse($publishedGoods as $publishedGood)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('siteOneGood', [
                                                    'id' => $publishedGood->id,
                                                    'tableId' => $publishedGood->table_id,
                                                    'link' => 1
                                                    ])}}">
                        перейти
                    </a>
                </td>
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
                <td style="width: 60px; border-bottom: 2px solid black; border-right: 1px solid black">
                    @if($publishedGood->img)
                        <img src="{{ \Storage::disk('public')->url( $publishedGood->img) }}" alt="avatar"
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
