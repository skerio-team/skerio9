@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong> {{ $comment->user->name }} </strong>
        <p> &nbsp; &nbsp; {{ $comment->comment }} </p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('admin.comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" class="form-control border-top border-right border-left"/>
                <input type="hidden" name="news_id" value="{{ $news_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-success" value="Reply" />
            </div>
            <hr />
        </form>
        @include('admin.news.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach