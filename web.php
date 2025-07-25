<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Welcome to My Laravel App!';
});
Route::get('/blade', function () {
    return view('hello');
});


Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Faiza']);
});
use App\Http\Controllers\PageController;

Route::get('/message', [PageController::class, 'showMessage']);
Route::get('/blade-view', [PageController::class, 'showBlade']);
Route::get('/layout-home', function () {
    return view('home');
});
Route::get('/cvo', function () {
    return view('home');
});
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/submit-form', [ContactController::class, 'handleForm']);

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/submit-form', [ContactController::class, 'handleForm']);



Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/submit-form', [ContactController::class, 'handleForm']);

use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class, 'showAll']);
Route::get('/insert-demo-products', [ProductController::class, 'insertDemoProducts']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit']);  // 👈 THIS
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
