@extends('layouts.site')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                @if($errors->any() || session()->has('errorNewPass') || session()->has('errorOldPass'))
                    <div class="alert alert-danger">Присутствуют ошибки заполнения формы</div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                @endif
                <div class="form-group" style="position: relative; max-width: 494px;">
                    <label for="avatar">Аватар пользователя</label>
                    <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
                    >
                        @if($user->avatar)
                            <form action="{{route('delMyAvatar')}}" method="post">
                                @csrf
                                <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                                     style="width: 200px;">
                                <button type="submit" style="border: none; background-color: white">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                        @else
                            <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                        @endif
                    </div>
                    <form method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="avatar" name="avatar" class="form-control" style="width: 500px;">
                        <input type="button"
                               id="clear"
                               class="delete_icon"
                               style="position: absolute; top: 252px;"
                        >
                        <script>
                            let control = document.querySelector("#avatar"),
                                clearBn = document.querySelector("#clear");
                            clearBn.addEventListener("click", function () {
                                control.value = '';
                                let newControl = control.cloneNode(true)
                                control.replaceWith(newControl);
                                control = newControl;
                            });
                        </script>
                        <div
                            style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                            <label for="name">Имя пользователя</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   @error('name') style="border: red 1px solid;" @enderror
                                   class="form-control"
                                   value="{{$user->name}}">
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                            <label for="surname">Фамилия пользователя</label>
                            <input type="text"
                                   id="surname"
                                   name="surname"
                                   @error('surname') style="border: red 1px solid;" @enderror
                                   class="form-control"
                                   value="{{$user->surname}}">
                            @if($errors->has('surname'))
                                @foreach($errors->get('surname') as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group" style="position: relative">
                            <label for="old_password">Старый пароль</label>
                            <input type="text"
                                   class="form-control password_hide hidden_text"
                                   id="old_password"
                                   onpaste="return false;"
                                   oncopy="return false;"
                                   name="old_password"
                                   autocomplete="off">
                            <a href="#" class="password_show" tabindex="-1"
                               onclick="return show_old_password(this);"></a>
                            @if(session()->has('errorOldPass'))
                                <span class="form-txt-danger">{{session()->get('errorOldPass')}}</span>
                            @endif
                        </div>
                        <div class="form-group" style="position: relative">
                            <label for="new_password">Новый пароль</label>
                            <input type="text"
                                   class="form-control password_hide hidden_text"
                                   id="new_password"
                                   onpaste="return false;"
                                   oncopy="return false;"
                                   name="new_password"
                                   autocomplete="off">
                            <a href="#" class="password_show" tabindex="-1"
                               onclick="return show_new_password(this);"></a>
                        </div>
                        <div class=" form-group" style="position: relative">
                            <label for="new_password_confirmation">Подтвердите пароль</label>
                            <input type="text"
                                   class="form-control
                                                      password_hide
                                                      hidden_text
                                                      @error('new_password_confirmation') form-control-danger @enderror"
                                   id="new_password_confirmation"
                                   onpaste="return false;"
                                   oncopy="return false;"
                                   name="new_password_confirmation"
                                   autocomplete="off">
                            @if($errors->has('new_password'))
                                @foreach($errors->get('new_password') as $error)
                                    <span class="form-txt-danger">{{ $error }}</span>
                                @endforeach
                            @endif
                            <a href="#" class="password_show" tabindex="-1"
                               onclick="return show_new_password_confirmation(this);"></a>
                            @if(session()->has('errorNewPass'))
                                <span class="form-txt-danger">{{session()->get('errorNewPass')}}</span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
                <a href="{{ route('myProfile') }}">Назад</a>
            </div>
        </div>
    </div>
    <style>
        .password_show {
            position: absolute;
            top: 35px;
            right: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url({{ asset('assets/guest-layout/img/view.svg') }}) 0 0 no-repeat;
        }

        .password_show.view {
            background: url({{ asset('assets/guest-layout/img/no-view.svg') }}) 0 0 no-repeat;
        }

        .delete_icon {
            position: absolute;
            top: 37px;
            right: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            border-style: none;
            background: url({{ asset('assets/guest-layout/img/delete_icon.svg') }}) 0 0 no-repeat;
        }

        .hidden_text {
            text-security: disc;
            -webkit-text-security: disc;
        }
    </style>
    <script>
        function show_old_password(target) {
            var input = document.getElementById('old_password');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }

        function show_new_password(target) {
            var input = document.getElementById('new_password');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }

        function show_new_password_confirmation(target) {
            var input = document.getElementById('new_password_confirmation');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }
    </script>

@endsection
