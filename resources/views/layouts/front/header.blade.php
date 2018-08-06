<nav class="fh5co-nav" role="navigation" >
    <div class="container">
        <div class="row">
            <div class="left-menu text-right menu-1">
                <ul>
                    <li><a href="{{route('work')}}">Work</a></li>
                    <li><a href="{{route('front.about')}}">About</a></li>
                    <li class="has-dropdown">
                        <a href="">Services</a>
                        <ul class="dropdown">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">eCommerce</a></li>
                            <li><a href="#">Branding</a></li>
                            <li><a href="#">API</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="logo text-center">
                <div id="fh5co-logo"><a href="{{route('front.home')}}">Orange.</a></div>
            </div>
            <div class="right-menu text-left menu-1">
                <ul>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="has-dropdown">
                        <a href="#">Tools</a>
                        <ul class="dropdown">
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">Sass</a></li>
                            <li><a href="#">jQuery</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('front.contact')}}">Contact</a></li>
                    @if(!auth()->check())
                    <li class="btn-cta"><a href="/register"><span>Sign Up</span></a></li>
                        @else
                        <li class="has-dropdown">
                            <a href="#">Account</a>
                            <ul class="dropdown">
                                <li><a href="#">Profile</a></li>
                                <li><a href="{{route('logout')}}">Logout</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

