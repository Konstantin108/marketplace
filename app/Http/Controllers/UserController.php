<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function users()
    {
        $users = User::all();
        return view('content/users/users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createUser()
    {
        return view('content/users/createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }
        if ($request->post('is_admin')) {
            $data['is_admin'] = $request->post('is_admin');
        }
        $user = User::create($data);
        if ($user) {
            return redirect()->route('users')
                ->with('success', 'Пользователь добавлен');
        }
        return back()
            ->with('error', 'Произошла ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function user(int $id, int $link, int $order_id)
    {
        $user = User::findOrFail($id);
        if ($link == 1) {
            $order_id = 0;
        }
        return view('content/users/user', [
            'user' => $user,
            'link' => $link,
            'order_id' => $order_id
        ]);
    }

    /**
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function backForUser(int $link, int $order_id)
    {
        if ($link == '1') {
            return redirect()->route('users');
        } elseif ($link == '2') {
            return redirect()->route('allOrders');
        } elseif ($link == '3') {
            return redirect()->route('getOrder', ['id' => $order_id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editUser(int $id, int $link, int $order_id)
    {
        $user = User::findOrFail($id);
        if ($link == 1) {
            $order_id = 0;
        }
        return view('content/users/editUser', [
            'user' => $user,
            'link' => $link,
            'order_id' => $order_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(UpdateUserRequest $request, int $id, int $link, int $order_id)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }
        if ($request->post('is_admin')) {
            $data['is_admin'] = $request->post('is_admin');
        }
        $user = User::findOrFail($id);
        $user = $user->fill($data)->save();
        if ($user) {
            return redirect()->route('user', [
                'id' => $id,
                'link' => $link,
                'order_id' => $order_id
            ])->with('success', 'Данные пользователя обновлены');
        }
        return back()
            ->with('error', 'Произошла ошибка');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(int $id, int $link)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $users = User::select()->get();
        $orders = Order::select()->get();
        foreach ($orders as $order) {
            if ($order['goods'] == 'null') {
                $order->delete();
            }
        }
        if ($link == '1') {
            if ($user) {
                return redirect()->route('users', ['users' => $users])
                    ->with('success', 'Пользователь и заказы пользователя удалены');
            }
            return back()
                ->with('error', 'Произошла ошибка');
        } elseif ($link == '2' or $link == '3') {
            if ($user) {
                return redirect()->route('allOrders', ['orders' => $orders])
                    ->with('success', 'Пользователь и заказы пользователя удалены');
            }
            return back()
                ->with('error', 'Произошла ошибка');
        }
    }
}
