@extends('todoList.main')

@section('content')

  <div class="container">

    <h1>New</h1>

    @include('todoList.errors')
    @include('todoList.messages')

    {!! Form::open(['path' => url('new')]) !!}
      {{ Form::token() }}
      <div class="mb-3">
        {{Form::label('title', 'Title', ['class' => 'form-label'])}}
        {{Form::text('title', '',['class' => 'form-control'])}}
      </div>
      <div class="mb-3">
        {{Form::label('body', 'Text', ['class' => 'form-label'])}}
        {{Form::textarea('body', '',['class' => 'form-control'])}}
      </div>
      {{Form::submit('Submit',['class' => 'btn'])}}
    {!! Form::close() !!}

  </div>

@endsection