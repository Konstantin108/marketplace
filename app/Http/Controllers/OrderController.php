<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PublishedGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allMyOrders()
    {
        $userId = Auth::user()->id;
        $orders = Order::select()->where('user_id', $userId)->get();
        foreach ($orders as $order) {
            if ($order['goods'] == 'null') {
                $order->delete();
            }
        }
        return view('content/orders/myOrders', ['orders' => $orders]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allOrders()
    {
        $orders = Order::select()->get();
        foreach ($orders as $order) {
            if ($order['goods'] == 'null') {
                $order->delete();
            }
        }
        return view('content/orders/allOrders', ['orders' => $orders]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getThisOrder(int $id)
    {
        $order = Order::findOrFail($id);
        $goodsInOrderJSON = json_decode($order['goods']);
        $goodsInOrder = [];
        foreach ($goodsInOrderJSON as $key => $item) {
            $idOFGood = DB::table('publishedGoods')
                ->where('table_id', $key)
                ->value('id');
            $good = PublishedGood::findOrFail($idOFGood);
            $good->counter = count($item);
            $goodsInOrder[] = $good;
        }
        return view('content/orders/oneOrder', [
            'order' => $order,
            'goodsInOrder' => $goodsInOrder
        ]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrderStatus(Request $request, int $id)
    {
        $data['status'] = $request->post('status');
        $order = Order::findOrFail($id);
        $order = $order->fill($data)->save();
        if ($order) {
            return redirect()->route('getThisOrder', ['id' => $id])
                ->with('success', 'Статус заказа обновлён');
        }
        return back()
            ->with('error', 'Произошла ошибка');
    }
}
