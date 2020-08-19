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
    </div>
    
  </div>

@endsection