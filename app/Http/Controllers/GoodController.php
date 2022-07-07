<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Number;
use App\Models\PublishedGood;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $goods = Good::select()->get();
        return view('content/goods', ['goods' => $goods]);
    }

    public function showPublishedGoods(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $publishedGoods = PublishedGood::select()->get();
        return view('content/publishedGoods', ['publishedGoods' => $publishedGoods]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function parserIndex(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('content/parserIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        $vehicle = (new Vehicle())->getVehicleById($id);
//        return view('show', ['vehicle' => $vehicle]);
        $good = Good::findOrFail($id);
        $good->delete();
        $goods = Good::select()->get();
        return view('content/goods', ['goods' => $goods]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGood(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        $vehicle = (new Vehicle())->getVehicleById($id);
//        return view('show', ['vehicle' => $vehicle]);
        $good = Good::findOrFail($id);
        return view('content/show', ['good' => $good]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createGood(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('content/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeGood(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'table_id',
            'name',
            'price',
            'info',
            'counter',
            'category',
            'brand',
            'designer',
            'size',
            'sale',
            'img'
        ]);
        Good::create($data);
        return redirect()->route('goods');
    }

    public function publishedGoods()
    {
        PublishedGood::get()->each->delete();
        $publishedGoods = DB::table('goods')->select(
            'table_id',
            'name',
            'price',
            'info',
            'counter',
            'category',
            'brand',
            'designer',
            'size',
            'sale',
            'img'
        )->get();

        foreach ($publishedGoods as $item) {
            if (is_object($item)) {
                $publishedGood = new PublishedGood();
                $publishedGood->table_id = $item->table_id;
                $publishedGood->name = $item->name;
                $publishedGood->price = $item->price;
                $publishedGood->info = $item->info;
                $publishedGood->counter = $item->counter;
                $publishedGood->category = $item->category;
                $publishedGood->brand = $item->brand;
                $publishedGood->designer = $item->designer;
                $publishedGood->size = $item->size;
                $publishedGood->sale = $item->sale;
                $publishedGood->img = $item->img;
                $publishedGood->save();
            }
        }
        $publishedGoods = PublishedGood::select()->get();
        return view('content/publishedGoods', ['publishedGoods' => $publishedGoods]);
//        return redirect()->route('publishedGoods', ['publishedGoods' => $publishedGoods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $good = Good::findOrFail($id);
        return view('content/edit', ['good' => $good]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'table_id',
            'name',
            'price',
            'info',
            'counter',
            'category',
            'brand',
            'designer',
            'size',
            'sale',
            'img'
        ]);
        $good = Good::findOrFail($id);
        $good = $good->fill($data)->save();
//        if ($good) {
            return redirect()->route('showGood', ['id' => $id]);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id): \Illuminate\Http\Response
//    {
        //
//    }
}
