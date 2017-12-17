    <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="/posts/create">Create Post</a>
            @if(Auth::check())
            <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
            <a class="nav-link " href="/logout">Sign Out</a>
            @else
            <a class="nav-link ml-auto" href="/login">Sign In</a>
            <a class="nav-link " href="/reg">Sign Up</a>
            @endif
          </nav>
        </div>
      </div>