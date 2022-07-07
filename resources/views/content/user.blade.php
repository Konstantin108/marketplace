@extends('layouts.main')
@section('content')

    <table class="table table-bordered">
        <h1>Один пользователь</h1>
        <div style="width: 30px; height: 30px;"></div>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black">имя</th>
            <th style="border: 2px solid black">почта</th>
            <th style="border: 2px solid black">права админа</th>
        </tr>
        </thead>
        <tbody>
        <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->id }}</td>
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
        </tbody>
    </table>
    @if(!$user->is_admin)
        <a href="{{ route('editUser', ['id' => $user->id]) }}">Редактировать</a>
        <a href="{{route('deleteUser', ['id' => $user->id])}}">Удалить</a>
    @endif
    <a href="{{route('users')}}">Назад</a>

@endsection
