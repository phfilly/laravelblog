<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/post/create">Create Post</a></li>
        <li><a href="/post">Posts</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

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