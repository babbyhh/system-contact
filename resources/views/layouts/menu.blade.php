<header>
      <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"> Contact</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact_index')}}">Contato</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
                    </li>
                @else 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auth.get-login')}}">Login</a>
                    </li>
                @endif
                
            </ul>
        </div>
    </nav>
</header>
