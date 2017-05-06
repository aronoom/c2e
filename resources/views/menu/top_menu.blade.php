<nav>
    <div class="bar_menu"></div>
    <div class="bar_recherche"></div>
</nav>  

{{--<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4 navbar-fixed-top" style="box-shadow: 0px 1px 5px rgba(0,0,0,.5);">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">C2e</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('forum.index') }}">Forum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tutoriel.index') }}">Tutoriel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('exercice.index') }}">Exercice</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{ route('projet.index') }}">Projet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">Membre</a>
          </li>
                   <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user/create') }}">Register</a></li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Logout</a></li>
                            
                    @endif
                
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    --}}