<header id="fh5co-header" role="banner">
    <div class="container">
        <div class="header-inner">
            <h1><a href="{{route('home')}}">Flew</a></h1>
            <nav role="navigation">
                <ul>
                    <li class="{{ Request::is('work') ? 'active' : '' }}"><a href="{{route('work')}}">Work</a></li>
                    <li class="{{ Request::is('services') ? 'active' : '' }}"><a href="{{route('services')}}">Services</a></li>
                    <li class="{{ Request::is('pricing') ? 'active' : '' }}"><a href="{{route('pricing')}}">Pricing</a></li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{route('about')}}">About</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                    <li class="cta"><a href="{{route('register')}}">Get started</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>