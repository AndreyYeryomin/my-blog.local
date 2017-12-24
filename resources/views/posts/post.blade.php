 <div class="blog-post">
            <h2 class="blog-post-title">
              <a href="/posts/{{$post->id}}">
                {{$post->title}}
              </a>
            </h2>
          
            <p class="blog-post-meta">{{$post->user->name}} on {{$post->created_at->toFormattedDateString()}}</p>
			<div class="col-sm-12">
            {!!$post->bodyFilter()!!}
        </div>
        <div class="blog-post-control">
        @if(Auth::user())
          <form method="POST" action="/posts/{{$post->id}}/likes">
            {{csrf_field()}}
            <button type="submit" class="btn btn-default" {{ $post->isLiked() ? 'disabled' : ''}}>
            {{$post->likes()->count()}} {{str_plural('Like', $post->likes()->count())}}
            </button>
         
          </form>
          <form method="POST" action="/posts/{{$post->id}}/dislikes">
            {{csrf_field()}}
            <button type="submit" class="btn btn-default" {{ $post->isDisliked() ? 'disabled' : ''}}>
            {{$post->dislikes()->count()}} {{str_plural('Dislike', $post->dislikes()->count())}}
            </button>
          </form>  
          @if(Auth::user() == $post->firstLiked())
          <a href="/posts-edit/{{$post->id}}" class="btn btn-default">Edit</a>
          @endif
          @if(Auth::user() == $post->user)
          <a href="/posts-delete/{{$post->id}}" class="btn btn-default">Delete</a>
          @endif
          @endif
        </div>
          </div><!-- /.blog-post -->