<nav class="navbar navbar-expand-lg navbar-dark bg-custom fixed-top">
    <a class="navbar-brand" href="#">MTALII
        <p class="brand-caption">The smooth way to go places</p>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">HOME </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('events')}}">EVENTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('plan') }}">CUSTOMER-CARE</a>
            </li>

            <li class="nav-item">
                <a class="btn custom-login-button" href="{{route('login')}}">Login</a>
            </li>
        </ul>
    </div>
</nav>