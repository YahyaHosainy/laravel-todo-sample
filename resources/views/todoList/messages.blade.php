@if(isset($msgs) and count($msgs) >= 1)
  @foreach($msgs as $msg)
    <div class="mb-3 alert-{{$msg['type']}}">
      {{$msg['msg']}}
    </div>
  @endforeach
@endif

@if(null !== session('msgs') and count(session('msgs')) >= 1)
  @foreach(session('msgs') as $msg)
    <div class="mb-3 alert-{{$msg['type']}}">
      {{$msg['msg']}}
    </div>
  @endforeach
@endif
