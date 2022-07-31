<?php

namespace App\Http\Controllers;

use App\Models\PublishedGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    /**
     * @param int $id
     * @param int $tableId
     * @param int $link
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToBasket(Request $request, int $id, int $tableId, int $link)
    {
        $userId = Auth::user()->id;            //<-- проверка id пользователя
        $request->session()->push(" $userId.$tableId", 1);            //<-- данные корзины храняться в сессии
        if ($request) {
            if ($link == 1) {
                return redirect()->route('siteOneGood', [
                    'id' => $id,
                    'tableId' => $tableId,
                    'link' => 1
                ])->with('success', 'Товар добавлен в корзину');
            } elseif ($link == 2) {
                return redirect()->route('myBasket')
                    ->with('success', 'Товар добавлен в корзину');
            }

        }
        return back()
            ->with('error', 'Произошла ошибка');
    }

    /**
     * @param int $id
     * @param int $tableId
     * @param int $link
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delFromBasket(Request $request, int $id, int $tableId, int $link)
    {
        $userId = Auth::user()->id;
        $thisGoodsInBasket = ($request->session()->get(" $userId.$tableId"));
        if (is_array($thisGoodsInBasket)) {
            $request->session()->forget(" $userId.$tableId");
            for ($i = 1; $i < count($thisGoodsInBasket); $i++) {
                $request->session()->push(" $userId.$tableId", 1);
            }
        }
        if ($request) {
            if ($link == 1) {
                return redirect()->route('siteOneGood', [
                    'id' => $id,
                    'tableId' => $tableId,
                    'link' => 1
                ])->with('success', 'Товар удалён');
            } elseif ($link == 2) {
                return redirect()->route('myBasket')
                    ->with('success', 'Товар добавлен в корзину');
            }
        }
        return back()
            ->with('error', 'Произошла ошибка');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function showSession(Request $request)
    {
        dd($request->session()->all());
    }

    /**
     * @param Request $request
     * @return void
     */
    public function clearSession(Request $request)
    {
        $request->session()->flush();
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myBasket(Request $request)
    {
        $userId = Auth::user()->id;
        $arr = [];
        $goodsInBasket = [];
        $actualGoods = PublishedGood::all();
        foreach ($actualGoods as $actualGood) {
            $arr[] = $actualGood->table_id;
        }
        $thisGoodsIdInBasket = $request->session()->get(" $userId");
        if (is_array($thisGoodsIdInBasket)) {
            foreach ($thisGoodsIdInBasket as $key => $item) {
                if (in_array($key, $arr)) {
                    $idOFGood = DB::table('publishedGoods')
                        ->where('table_id', $key)
                        ->value('id');
                    $thisGood = PublishedGood::findOrFail($idOFGood);
                    $thisGood->counter = count($item);
                    $goodsInBasket[] = $thisGood;
                }
            }
        }
        sort($goodsInBasket);
        return view('content/publishedGoods/basket', ['goodsInBasket' => $goodsInBasket]);
    }

    /**
     * @param int $link
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function backForSite(int $link)
    {
        if ($link == '1') {
            return redirect()->route('siteIndex');
        } elseif ($link == '2') {
            return redirect()->route('myBasket');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
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
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
