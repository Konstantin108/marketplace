@extends('layouts.main')
@section('content')

    <table class="table table-bordered">
        <h1>Список всех пользователей</h1>
        <div style="width: 30px; height: 30px;"></div>
        <a href="{{route('createUser')}}">Добавить пользователя</a>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
            <th style="border: 2px solid black">имя</th>
            <th style="border: 2px solid black">почта</th>
            <th style="border: 2px solid black">права админа</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('user', ['id' => $user->id])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $user->name }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->email }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    @if($user->is_admin)
                        да
                    @else
                        нет
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
