

<div class="col-md-8 mx-auto">
    <div class="box box-widget">
      <div class="box-header with-border">
        <div class="user-block">
    <img class="rounded-circle" src="{{ $topic->user->avatar && $topic->user->avatar->path ? asset('storage') . '/' . $topic->user->avatar->path : asset('storage/avatars/default-avatar.png') }}" alt="User Image">

          <span class="username"><a href="{{route('forum.topic', ['id'=>$topic->id])}}">{{$topic['title']}}</a></span>
          <span class="description">By: {{$topic->user->name}} | {{$topic['created_at']->format('d.m.y. | H:i')}}</span>
        </div>
      </div>
      <div class="box-body">
        <p>{{$topic['content']}}</p>

        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
        <button type="button" onclick="toggleVisibility({{$topic->id}})" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> Comments</button>
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>

        @auth
        @if ($topic->user_id == auth()->user()->id)
        <form class="col-1 float-end" action="{{route('forum.topic.delete', ['id'=>$topic->id])}}" method="POST">
          @csrf
        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
        </form> <br>
        @endif
        @endauth

        <span class="text-muted">45 likes - {{$topic->comment->count()}} komentar/a</span>
      </div>

      @include('partials.show-comments')


    </div>
  </div>
