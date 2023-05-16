<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view("posts.posts");
});
Route::get('/create-user', [UserController::class , 'createUserWithProfile']);
Route::get('/many-many', [UserController::class , 'ManyToMany']);
Route::get('/many-many-index', [UserController::class , 'ManyToManyIndex']);
