<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{route('blogIndex')}}">
                Acortador </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allsalud')}}">
                        <i class="material-icons">health_and_safety</i> Salud
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allgracioso')}}">
                        <i class="material-icons">mood</i> Entretenimiento
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allcuriosidades')}}">
                        <i class="material-icons">new_releases</i> Curiosidades
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allvideo')}}">
                        <i class="material-icons">video_library</i> Videos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('alltecnologia')}}">
                        <i class="material-icons">settings_applications</i> Tecnologia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allmanualidades')}}">
                        <i class="material-icons">build</i> Manualidades
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('DashBoard')}}">
                        <i class="material-icons">http</i> Acortar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">follow_the_signs</i> Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showLogin')}}">
                        <i class="material-icons">fingerprint</i> Entrar
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>