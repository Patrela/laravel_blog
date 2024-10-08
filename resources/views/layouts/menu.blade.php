<header class="header">
    <div class="menu">

        <div class="logo">
            <!--Logo-->
            <a href="{{route('home.index')}}"><img src="{{ asset('img/logo.png')}}" alt="Logo"></a>
        </div>
        <nav class="nav">
        @guest
            <ul class="d-flex">
                <li class="me-2"><a href="{{ route('login') }}" class="login">Login</a></li>
                <li><a href="{{ route('register') }}" class="create">Register</a></li>
            </ul>
        @else
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="{{ Auth::user()->profile->photo ?
                            asset('storage/' . Auth::user()->profile->photo )
                            : asset('img/user-default.png')}}"
                            alt="Profile" class="img-profile">

                    <span class="name-user">{{Auth::user()->full_name}}</span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item"
                            href="{{route('profiles.edit', Auth::user()->profile)}}">Profile</a></li>
                    @can('admin.index')
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Management</a></li>
                    @endcan

                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Exit</a>
                    </li>
                </ul>
            </div>
        @endguest

        </nav>
    </div>

</header>
