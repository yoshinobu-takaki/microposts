@extends('layouts.app')

@section('content')
  <div class="row">
    
    <aside class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ $user->name }}</div>
        </div>
        <div class="card-body">
          <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        </div>
      </div>
    </aside>
    
    <div class="col-sm-8">
      <ul class=nav nav-tabs nav-justifide md-3>
        <li class="nav-item"><a href="#" class="nav-link">TimeLine</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Following</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Follower</a></li>
      </ul>
    
    
    <!--投稿フォーム-->
    @if (Auth::id() == $user->id)
      {!! Form::open(['route' => 'microposts.store']) !!}
        <div class="form-group">
          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
      {!! Form::close() !!}
    @endif
    
    <!--投稿が1個以上あれば投稿を表示-->
    @if (count($microposts) > 0)
      @include('microposts.microposts', ['microposts' => $microposts])
    @endif
    
  　</div>
  </div>

@endsection