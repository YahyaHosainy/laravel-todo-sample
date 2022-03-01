@extends('todoList.main')

@section('content')
  <div class="container">
    <h1>Marked Todos</h1>
    @include('todoList.messages')
    @foreach ($todos as $todo)
      <h4>
        {{$todo->title}} &MediumSpace;
        <small>
          <a class="btn" href="/unmark/{{$todo->id}}">Unmark this &lArr;</a> &MediumSpace;
          <a class="btn" href="/delete/{{$todo->id}}">Delete &#x2715;</a>
        </small>
      </h4>
      <p>
        {{$todo->body}}
        <br>
        <small style="color:gray">
          {{$todo->date}}
        </small>
      </p>
      <hr>
    @endforeach
  </div>
@endsection