<?php

use App\Http\Controllers\TodoList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodoList::class,'home']);

Route::get('/new', [TodoList::class,'new']);

Route::post('/new', [TodoList::class,'store']);

Route::get('/markeds', [TodoList::class,'markeds']);

Route::get('/mark/{todo}', [TodoList::class,'mark'])->whereNumber('todo');

Route::get('/unmark/{todo}', [TodoList::class,'unmark'])->whereNumber('todo');

Route::get('/delete/{todo}', [TodoList::class,'delete'])->whereNumber('todo');

