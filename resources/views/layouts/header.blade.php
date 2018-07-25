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
                    @if(!Auth::check())
                        <li class="cta"><a href="{{route('register')}}">Sign Up/Sign In</a></li>
                    @else
                        <li class="cta"><a href="{{(Auth::user()->role_id == 1)?route('admin'):route('home')}}"> Profile</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>