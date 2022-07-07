@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                <h1>Артикул №{{$good->table_id}} - редактирование данных</h1>
                {{--            @if($errors->any())--}}
                {{--                <div class="alert alert-danger">Необходимо заполнить все поля</div>--}}
                {{--            @endif--}}
                <form method="post" action="{{ route('update', ['id' => $good->id]) }}">
                    @csrf
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="table_id">table_id</label>
                        <input type="number"
                               id="table_id"
                               name="table_id"
                               {{--                           @error('title') style="border: red 1px solid;" @enderror--}}
                               class="form-control"
                               value="{{$good->table_id}}">
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
                               value="{{$good->name}}">
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
                               value="{{$good->category}}">
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
                               value="{{$good->price}}">
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
                               value="{{$good->info}}">
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
                               value="{{$good->counter}}">
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
                               value="{{$good->brand}}">
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
                               value="{{$good->designer}}">
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
                               value="{{$good->size}}">
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
                               value="{{$good->sale}}">
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
                               value="{{$good->img}}">
                        {{--                    @if($errors->has('title'))--}}
                        {{--                        @foreach($errors->get('title') as $error)--}}
                        {{--                            {{ $error }}--}}
                        {{--                        @endforeach--}}
                        {{--                    @endif--}}
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
                <a href="{{route('showGood', ['id' => $good->id])}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
