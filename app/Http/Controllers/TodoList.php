<?php

namespace App\Http\Controllers;

use App\Models\Marked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoList extends Controller
{

  public function home()
  {
    return view('todoList/home', [
      'active_todos' => 'active',
      'title' => 'Todo List - Home',
      'todos' => Todo::has('markeds', "=", 0)->get()
    ]);
  }

  public function new()
  {
    return view('todoList/new', [
      'active_new' => 'active',
      'title' => 'Todo List - New'
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => ['required', 'max:100', 'min:2'],
      'body' => ['required', 'max:500', 'min:10']
    ]);

    $users = new Todo;
    $users->title = $request->title;
    $users->body = $request->body;
    $users->save();

    return redirect('/')->with('msgs', [
      [
        'type' => 'success',
        'msg'  => 'New todo itme created .'
      ]
    ]);
  }

  public function markeds()
  {
    return view('todoList/markeds', [
      'active_markeds' => 'active',
      'title' => 'Todo List - Home',
      'todos' => Todo::has("markeds")->get()
    ]);
  }

  public function mark(Todo $todo)
  {
    if (
      !$todo->isMarked()
    ) {
      $mark = new Marked();
      $mark->for_ = $todo->id;
      $mark->save();
      return redirect('/')->with('msgs', [
        [
          'type' => 'success',
          'msg'  => 'Todo marked .'
        ]
      ]);
    } else {
      return abort(404);
    }
  }

  public function unmark(Todo $todo)
  {
    if (
      $todo->isMarked()
    ) {
      Marked::where('for_', $todo->id)->delete();
      return redirect('/markeds')->with('msgs', [
        [
          'type' => 'success',
          'msg'  => 'Todo unmarked .'
        ]
      ]);
    } else {
      return abort(404);
    }
  }

  public function delete(Todo $todo)
  {
    Marked::where('for_', $todo->id)->delete();
    $todo->delete();
    return redirect('/')->with('msgs', [
      [
        'type' => 'info',
        'msg'  => 'Todo DELETED .'
      ]
    ]);
  }
}
