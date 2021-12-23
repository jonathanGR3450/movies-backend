<nav class="navbar navbar-light bg-white navbar-expand-md shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" href="">@lang('Home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('about') }}" href="">@lang('About')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('project.*') }}" href="">@lang('Portfolio')</a>
                </li>
            </ul>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">@csrf</form>
</nav>