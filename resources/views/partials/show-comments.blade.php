@error('commentError')
    <span class="border-bottom border-danger d-block fs-6 text-danger mt-2">{{ $message }}</span>
@enderror

<div class="d-none" id="{{ $topic->id }}">

    <div class="box-footer box-comments">

        @foreach ($topic->comment as $comment)
            <div class="box-comment">
                <img class="rounded-circle"
                    src="{{ $comment->user->avatar && $comment->user->avatar->path ? asset('storage') . '/' . $comment->user->avatar->path : asset('storage/avatars/default-avatar.png') }}"
                    alt="User Image">
                <div class="comment-text">
                    <span class="username">
                        {{ $comment->user->name }}</span>

                    <span class="text-muted pull-right">{{ $comment['created_at']->format('d.m.y. | H:i') }}
                        @auth
                            @if ($comment->user_id == auth()->user()->id)
                                <form action="{{ route('comment.delete', ['id' => $comment->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class=" pull-right btn btn-danger btn-sm" id="comment-delete"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            @endif
                        @endauth
                    </span>

                    {{ $comment->comment_content }}

                </div>
            </div>
        @endforeach
    </div>

    @auth

    <div class="box-footer">
        <form action="{{ route('comment.create', ['topic_id' => $topic->id]) }}" method="POST">
            @csrf
            <img class="img-responsive img-circle img-sm"
                src="{{ auth()->user()->avatar && auth()->user()->avatar->path
                    ? asset('storage') . '/' . auth()->user()->avatar->path
                    : asset('storage/avatars/default-avatar.png') }}"
                alt="User Image">
            <div class="img-push">
                <input type="text" name="comment_content" class="form-control input-sm"
                    placeholder="Press enter to post comment">
            </div>
        </form>
    </div>
    @endauth
</div>

