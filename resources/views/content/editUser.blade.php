@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                {{--            @if($errors->any())--}}
                {{--                <div class="alert alert-danger">Необходимо заполнить все поля</div>--}}
                {{--            @endif--}}
                <form method="post" action="{{ route('updateUser', ['id' => $user->id]) }}">
                    @csrf
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="name">Имя пользователя</label>
                        <input type="text"
                               id="name"
                               name="name"
                               {{--                           @error('name') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{$user->name}}">
                        {{--                    @if($errors->has('name'))--}}
                        {{--                        @foreach($errors->get('name') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="email">Почта</label>
                        <input type="text"
                               id="email"
                               name="email"
                               {{--                           @error('name') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{$user->email}}">
                        {{--                    @if($errors->has('name'))--}}
                        {{--                        @foreach($errors->get('name') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="password">Пароль</label>
                        <input type="text"
                               id="password"
                               name="password"
                               {{--                           @error('name') style="border: red 1px solid;" @enderror--}}
                               class="form-control">
                        {{--                    @if($errors->has('name'))--}}
                        {{--                        @foreach($errors->get('name') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">

                        <input type="radio"
                               name="is_admin"
                               id="in_process"
                               value="1">
                        <label for="is_admin">админ</label>
                        <input type="radio"
                               name="is_admin"
                               id="in_process"
                               value="0">
                        <label for="is_admin">пользователь</label>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
                <a href="{{route('user', ['id' => $user->id])}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
