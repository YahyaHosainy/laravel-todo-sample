<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{isset($title) ? $title : 'Todo List'}}</title>
  <style>
    body,html {
      font-family: Arial, Helvetica, sans-serif ;
      font-size: 16px ;
      margin: 0 ;
      box-sizing: border-box
    }
    * {
      box-sizing: inherit 
    }
    #nav {
      padding: 10px 20px ;
      background-color: black ;
      color: lightblue ;
    }
    #nav a {
      color:inherit ;
      text-decoration: none ;
    }
    #nav a.active {
      text-decoration: underline
    }
    #main {
      overflow: auto
    }
    .container {
      padding: 0 20px ;
    }
    .form-control {
      outline: 0 ;
      display: block ;
      width: 100% ;
      padding: 5px 20px; 
      border-radius: 5px ;
      border: 1px solid rgb(207, 207, 207) ;
      background-color: white ;
      font: inherit
    }
    .mb-3 {
      margin-bottom: 30px ;
    }
    .btn {
      outline: 0 ;
      display: inline-block ;
      padding: 5px 20px; 
      border-radius: 5px ;
      border: 1px solid rgb(207, 207, 207) ;
      background-color: white ;
      font: inherit;
      cursor: pointer;
      text-decoration: none ;
    }
    .btn:hover {
      background-color: lightblue ;
      border-color: blue ;
    }
    .alert-danger ,.alert-success ,.alert-info{
      display: block ;
      width: 100% ;
      padding: 5px 20px; 
      border-radius: 5px ;
      border: 1px solid rgb(207, 207, 207) ;
      background-color: rgb(241, 187, 187) ;
      font: inherit ;
      color: black ;
    }
    .alert-success {
      background-color: lightgreen ;
    }
    .alert-info {
      background-color: lightblue ;
    }
    .mb-0 {
      margin-bottom: 0px !important ;
    }
    .mt-0 {
      margin-top: 0px !important
    }
    .ml-0 {
      margin-left: 0px !important
    }
    .pl-0 {
      padding-left: 0px !important
    }
  </style>
</head>
<body>
  <nav id="nav">
    <a href="{{ route('home') }}" class="{{$active_todos ?? ''}}">Todos</a>&MediumSpace;
    <a href="{{ route('markeds') }}" class="{{$active_markeds ?? ''}}">Markeds</a>&MediumSpace;
    <a href="{{ route('newTodo') }}"  class="{{$active_new ?? ''}}">New</a>
  </nav>
  <main id="main">
    @yield('content')
  </main>

  <script>
    document.getElementById('main').style.height = 'calc( 100vh - '+
      document.getElementById('nav').clientHeight
    +'px )' ;
  </script>
</body>
</html>