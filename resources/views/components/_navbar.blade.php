<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
    <div class="container-fluid mx-3">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/plogo.png" width="80px" height="80px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-5 d-flex align-items-center">
                    <a class="sec-text my-auto text-decoration-none nav-fs" href="{{route('announcements.index')}}">Annunci</a>
                </li>
                <li class="nav-item mx-5 d-flex align-items-center">
                    <a class="sec-text text-decoration-none nav-fs" href="{{route('announcement.create')}}">Crea annunci</a>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn dropdown-toggle sec-text dropdown-toggle nav-fs" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="categoryDropdown">
                        <li>
                            @foreach($categories as $category)
                            
                            <a class="dropdown-item ps-3" href="{{ route('announcements.show', compact('category')) }}">
                                {{ $category->name}}
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item mx-5 d-flex align-items-center">
                        <a class="sec-text text-decoration-none nav-fs" href="{{route('revisor.index')}}">Revisioni</a>
                    </li>

                    <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>   
                            </li>
                        </ul>
                    </li>
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>
