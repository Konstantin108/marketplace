@extends('layouts.site')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <table class="table table-bordered">
        <h1>Мой профиль</h1>
        <div style="width: 300px;
             display:flex;
             justify-content: flex-start;
             margin-bottom: 20px;"
        >
            @if($user->avatar)
                <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                     style="width: 200px;">
            @else
                <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
            @endif
        </div>
        <div style="width: 30px; height: 30px;"></div>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">имя</th>
            <th style="border: 2px solid black">почта</th>
        </tr>
        </thead>
        <tbody>
        <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                {{ $user->name }}
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->email }}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('editProfile') }}">Редактировать</a>
    <a href="{{route('siteIndex')}}">Назад</a>

@endsection
