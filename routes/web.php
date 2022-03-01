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

Route::get('/', [TodoList::class,'home'])->name('home');

Route::get('/new', [TodoList::class,'new'])->name('newTodo');

Route::post('/new', [TodoList::class,'store'])->name('new');

Route::get('/markeds', [TodoList::class,'markeds'])->name('markeds');

Route::get('/mark/{todo}', [TodoList::class,'mark'])->whereNumber('todo')->name('mark');

Route::get('/unmark/{todo}', [TodoList::class,'unmark'])->whereNumber('todo')->name('unmark');

Route::get('/delete/{todo}', [TodoList::class,'delete'])->whereNumber('todo')->name('delete');

