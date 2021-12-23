<nav class="navbar navbar-light bg-white navbar-expand-md shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home.*') }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('author.*') }}" href="{{ route('author.index') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('project.*') }}" href="{{ route('category.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('project.*') }}" href="">Movies</a>
                </li>
            </ul>
        </div>
    </div>

</nav>