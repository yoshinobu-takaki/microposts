@if(count($errors)>0)
  <ul class="alert alert-danger" rol="alert">
    @foreach($errors->all() as $error)
      <li class="ml-4"> {{$error}} </li>
    @endforeach
  </ul>
@endif