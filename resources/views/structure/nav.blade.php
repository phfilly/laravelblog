<nav class="navbar navbar-default">
  <div class="container">

   <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/images/logo.png" class="logo"></a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li>
            <a href="/">
              <span class='glyphicon glyphicon-home'></span>  Home
            </a>
        </li>
        <li>
            <a href="/post/create">
              <span class='glyphicon glyphicon-plus-sign'> </span>  Add Post
            </a>
        </li>
        <li>
            <a href="/category/create">
              <span class='glyphicon glyphicon-plus-sign'> </span>  Add Category
            </a>
        </li>
        <li>
            <a href="/post">
              <span class='glyphicon glyphicon-folder-open'></span>&nbsp;  Posts
            </a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
          <li class="active dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class='glyphicon glyphicon-user'></span>  {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/post/my-posts">My posts</a></li>
              <li><a href="/my-dashboard">Edit Profile</a></li>
            </ul>
          </li>
          <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @else
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
        @endif

      </ul>
    </div>

  </div>
</nav>

<!-- BREADCRUMBS -->
    <div class='container' style='padding:0px;'>
        <ol class='breadcrumb'>
            <li>
              <a href='/' title='Home'>
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>

            @for($i = 1; $i <= count(Request::segments()); $i++)
              <li>

              @php
                $tmp = Request::segment($i);
                $title = str_replace("-", " ",Request::segment($i));
                $title = title_case($title);
              @endphp

                {{ ucfirst($title) }}
                @if($i < count(Request::segments()) && $i > 1)
                  {!!'<i class="fa fa-angle-right"></i>'!!}
                @endif
              </li>
            @endfor


        </ol>
    </div>
