<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskEditRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index($filter): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if ($filter != 0) {
            switch ($filter) {
                case 1:
                    $flt = 'новая';
                    break;
                case 2:
                    $flt = 'в работе';
                    break;
                case 3:
                    $flt = 'выполнена';
                    break;
                case 4:
                    $flt = 'ошибка';
                    break;
            }
            $tasks = Task::select()
                ->where('status', $flt)
                ->paginate(10);
        } else {
            $tasks = Task::select()
                ->paginate(10);
        }

        $msg = '';

        return view('content.tasksIndex', [
            'tasks' => $tasks,
            'msg' => $msg,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('content.create-task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request): \Illuminate\Http\RedirectResponse
    {
        $userId = Auth::user()->id;

        $key = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            mt_rand(0, 0xffff),

            mt_rand(0, 0x0fff) | 0x4000,

            mt_rand(0, 0x3fff) | 0x8000,

            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        $data['task_name'] = $request->validated([
            'task_name'
        ]);
        $data['key'] = $key;
        $data['status'] = 'новая';
        $data['user_id'] = Auth::user()->id;
        $data['user_name'] = Auth::user()->name;
        $task = Task::create($data);

        if ($task) {
            return redirect()->route('myTasks', ['userId' => $userId])
                ->with('success', "Задача \"${data['task_name']}\" создана! Присвоен уникальный ключ: ${key}");
        }
        return back(['userId' => $userId])
            ->with('error', 'Произошла ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param string $msg
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id, $link, $filter): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $task = Task::findOrFail($id);
        $msg = '';
        if ($task['status'] === 'новая') {
            $task['status'] = 'в работе';
            $task->save();
            $date = now();
            $msg = "${date} - задача принята в работу, статус обновлён";
            return view('content.oneTask',
                [
                    'task' => $task,
                    'msg' => $msg,
                    'link' => $link,
                    'filter' => $filter
                ]);
        }
        return view('content.oneTask',
            [
                'task' => $task,
                'msg' => '',
                'link' => $link,
                'filter' => $filter
            ]);
    }

    public function taskEdit(Request $request, $id, $link, $filter)
    {
        $task = Task::findOrFail($id);
        $userId = Auth::user()->id;
        $commentValue = $request->input('comment');
        $data['comment'] = $commentValue;
        $find = "ERROR: ";
        $pos = strpos($commentValue, $find);
        $error = 'задача выполнена';
        if ($pos !== false) {
            $error = "присутствует ошибка: {$commentValue}";
            $data['status'] = 'ошибка';
        } else {
            if ($request->input('status') == '1') {
                $data['status'] = 'выполнена';
            } else {
                $data['status'] = 'в работе';
            }
        }

        $newStatus = $task->fill($data);
        if ($newStatus->save()) {
            if ($link == '1') {
                return redirect()->route('index', ['filter' => $filter])
                    ->with('success', "Статус задачи обновлен! {$error}");
            } elseif ($link == '2') {
                return redirect()->route('myTasks', ['userId' => $userId])
                    ->with('success', "Статус задачи обновлен {$error}");
            }
        }
        return back()
            ->with('error', 'Произошла ошибка');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id, $link, $filter)
    {
        $task = Task::findOrFail($id);
        return view('content.delete', [
            'task' => $task,
            'link' => $link,
            'filter' => $filter
        ]);
    }

    public function back($link, $filter)
    {
        $userId = Auth::user()->id;

        if ($link == '1') {
            return redirect()->route('index', ['filter' => $filter]);
        } elseif ($link == '2') {
            return redirect()->route('myTasks', ['userId' => $userId]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id, $link, $filter)
    {
        $userId = Auth::user()->id;
        $task = Task::findOrFail($id);

        if ($userId === $task['user_id'] && $task['status'] === 'новая') {
            $task->delete();
            if ($link == '1') {
                if (true) {
                    return redirect()->route('index', ['filter' => $filter])
                        ->with('success', "Задача c ключом {$task['key']} удалена");
                } else {
                    return back()->with('error', 'Произошла ошибка');
                }
            } elseif ($link == '2') {
                if (true) {
                    return redirect()->route('myTasks', ['userId' => $userId])
                        ->with('success', "Задача c ключом {$task['key']} удалена");
                } else {
                    return back()->with('error', 'Произошла ошибка');
                }
            }
        }
        return redirect()->route('delete',
            [
                'id' => $id,
                'link' => $link,
                'filter' => $filter
            ])
            ->with('success', 'ОШИБКА! удаление невозможно - задача имеет статус отличный от "новая" и/или создана другим пользователем');
    }
}
