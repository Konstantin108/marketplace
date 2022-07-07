@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Добавление новой записи</h1>
                {{--            @if($errors->any())--}}
                {{--                <div class="alert alert-danger">Необходимо заполнить все поля</div>--}}
                {{--            @endif--}}
                <form method="post" action="{{ route('storeGood') }}">
                    @csrf
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="table_id">table_id</label>
                        <input type="number"
                               id="table_id"
                               name="table_id"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('table_id')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="name">name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('name')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="category">category</label>
                        <input type="text"
                               id="category"
                               name="category"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('category')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="price">price</label>
                        <input type="text"
                               id="price"
                               name="price"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('price')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="info">info</label>
                        <input type="text"
                               id="info"
                               name="info"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('info')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="counter">counter</label>
                        <input type="text"
                               id="counter"
                               name="counter"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('counter')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="brand">brand</label>
                        <input type="text"
                               id="brand"
                               name="brand"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('brand')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="designer">designer</label>
                        <input type="text"
                               id="designer"
                               name="designer"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('designer')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="size">size</label>
                        <input type="text"
                               id="size"
                               name="size"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('size')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="sale">sale</label>
                        <input type="number"
                               id="sale"
                               name="sale"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('sale')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="img">img</label>
                        <input type="text"
                               id="img"
                               name="img"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{old('img')}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
                <a href="{{route('goods')}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
