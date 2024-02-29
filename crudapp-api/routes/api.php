<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('items', [Itemcontroller::class, 'index']);
Route::post('items', [Itemcontroller::class, 'store']);
route::get('items/{id}',[Itemcontroller::class, 'show']);
route::get('items/{id}/edit',[Itemcontroller::class, 'edit']);
route::put('items/{id}/edit',[Itemcontroller::class, 'update']);
route::delete('items/{id}/delete',[Itemcontroller::class, 'destroy']);