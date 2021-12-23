<nav class="navbar navbar-light bg-white navbar-expand-md shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home.*') }}" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('author.*') }}" href="{{ route('author.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('category.*') }}" href="{{ route('category.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('movie.*') }}" href="{{ route('movie.index') }}">Peliculas</a>
                </li>
            </ul>
        </div>
    </div>

</nav>