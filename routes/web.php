<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $producs = \App\Models\Product::query()
        ->select(['id', 'title', 'brand_id', 'brand'])
        ->with(['brand'])
        ->get();
    foreach ($producs as $produc)
    {
        dump($produc->brand->title);
    }

    return view('welcome');
});
