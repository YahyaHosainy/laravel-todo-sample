@if ($errors->any())
  <div class="alert-danger mb-3">
    <ul class="mb-0 mt-0 pl-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif