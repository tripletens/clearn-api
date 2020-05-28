<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        {{--  calling the sidenav here   --}}
        <span type="button" style="font-size:30px;cursor:pointer; margin:15px; margin-top:20px;padding:5px;" onclick="openNav()">
            &#9776;</span>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>

        <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/posts">Videos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/past-questions">Past Questions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/posts/create">{{ __('Create Tutorial Video') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/past-questions/create">{{ __('Upload Past Questions pdf') }}</a>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <span class="glyphicon glyphicon-log-in"></span>{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <span class="glyphicon glyphicon-user"></span>{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" role="menu">
                            <li>
                                <a class="dropdown-item" href="/home">Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
        {{--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"> Login</a></li>  --}}
      </ul>
    </div>
  </div>
</nav>
