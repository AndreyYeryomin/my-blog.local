 <div class="blog-post">
          
            <h2 class="blog-post-title">
              <a href="/posts/{{$post->id}}">
                {{$post->title}}
              </a>
            </h2>
          
            <p class="blog-post-meta">{{$post->user->name}} on {{$post->created_at->toFormattedDateString()}}</p>
			<div class="col-sm-12">
            {{$post->body}}
        </div>
          </div><!-- /.blog-post -->