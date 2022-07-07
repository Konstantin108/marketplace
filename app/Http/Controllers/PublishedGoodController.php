<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\PublishedGood;

class PublishedGoodController extends Controller
{

    public function index()
    {
        //
    }

    public function parserIndex()
    {
        //
    }

    public function delete(int $id)
    {
        //
    }

    public function oneGood(int $id)
    {
        $publishedGood = PublishedGood::findOrFail($id);
        return view('content/oneGood', ['publishedGood' => $publishedGood]);
    }

    public function createGood()
    {
        //
    }


    public function storeGood(Request $request)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
