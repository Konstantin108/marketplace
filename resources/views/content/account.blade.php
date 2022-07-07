@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}}
    @elseif(session()->has('error'))
        {{session()->get('fail')}}
    @endif

    <table class="table table-bordered">
        <h1>Мои задачи</h1>

        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">Ссылка</th>
            <th style="border: 2px solid black">Создатель</th>
            <th style="border: 2px solid black">Имя задачи</th>
            <th style="border: 2px solid black">Статус</th>
            <th style="border: 2px solid black">Комментарий</th>
            <th style="border: 2px solid black">Уникальный ключ</th>
        </tr>
        </thead>
        <tbody>
        @forelse($myTasks as $task)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; display: flex; justify-content: space-around">
                    <a href="{{route('show', ['id' => $task->id, 'msg' => $msg, 'link' => '2', 'filter' => 0])}}">
                        перейти
                    </a>
                    <a href="{{route('delete', ['id' => $task->id,  'link' => '2', 'filter' => 0])}}">
                        удалить
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $task->user_name }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->task_name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->status }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->comment }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->key }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутсвтуют</td>
    @endforelse
    {{$myTasks->links()}}

@endsection
