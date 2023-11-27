<header>
            <nav class="navbar sticky-top bg-transparent navbar-expand-lg navbar-dark bg-dark p-md3">
                <a class="navbar-brand main-nav-brand" href="#">MINI-IGRE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link main-nav-link scalable" href="{{route('index')}}">Pocetna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-nav-link scalable" href="{{route('forum')}}">Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-nav-link scalable" href="#">Kontakt</a>
                        </li>
                    </ul>

                    @auth()
                    <ul class="navbar-nav ms-auto text-center ">
                        <li class="nav-but main-nav-but">
                            <a class="btn btn-outline-light main-nav-link" href="{{route('user.profile')}}">{{Auth::user()->name}}</a>
                        </li>
                        <li class="nav-but main-nav-but">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="btn btn-outline-light main-nav-link" type="submit">Odjavi se</button>
                            </form>
                        </li>
                    </ul>
                    @endauth

                    @guest()
                    <ul class="navbar-nav ms-auto text-center ">
                        <li class="nav-but main-nav-but">
                            <a class="btn btn-outline-light main-nav-link" href="{{route('login')}}">Prijavi se</a>
                        </li>
                        <li class="nav-but main-nav-but">
                            <a class="btn btn-outline-light main-nav-link" href="{{route('register')}}">Registruj se</a>
                        </li>
                    </ul>
                    @endguest

                </div>
            </nav>
</header>
