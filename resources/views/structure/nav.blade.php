<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/post/create">Create Post</a></li>
        <li><a href="/post">Posts</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
          <li class="active dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/post/my-posts">My posts</a></li>
              <li><a href="/my-dashboard">View Profile</a></li>
            </ul>
          </li>
          <li><a href="/logout">Logout</a></li>
        @else
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
        @endif

      </ul>

    </div>
  </div>
</nav>