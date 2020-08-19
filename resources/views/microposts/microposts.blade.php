<!--ポスト一覧のビュー-->

<ul class="list-unstyled">
  @foreach ($microposts as $micropost)
  
    <li class="media mb-3">
      <!--アイコン画像-->
      <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
      
      <div class="media-body">
        <!--ユーザー名-->
        <div>
          {!! link_to_route('users.show',$micropost->user->name,['id'=>$micropost->user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
        </div>
      
        <!--投稿内容-->
        <div>
          <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
        </div>
        <!--削除ボタン-->
        <div>
          @if (Auth::id() == $micropost->user_id)
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
          @endif
        </div>
      </div>
      
    </li>
  @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}