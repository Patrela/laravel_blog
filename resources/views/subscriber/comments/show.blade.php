<div class="comments-content">
    @foreach ($comments as $comment)
    <div class="comments-body">
            <span class="comment-head"> {{ $comment->user->full_name}} &nbsp; &nbsp; {{ $comment->value}} ⭐</span>
            <p class="comment-description line"> {{ $comment->description}}</p>
            <span class="comment-date">{{ date_format($comment->created_at,"Y/m/d")}} </span>
    </div>
    <hr>
    @endforeach
    <div class="links-paginate">
        {{ $comments->links()}}
    </div>
</div>
