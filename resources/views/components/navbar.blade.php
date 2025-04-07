<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<nav>
    <ul id="navbar" class="side-nav text-black">
        <li class="bold nav-logo">
            <div class="logo">
                <img id="site-logo" src="{{ asset('img/logo_black.png') }}" alt="Logo">
            </div>
            <div class="text-center logo-caption">Rishan Thirukumar</div>
        </li>

        @php
            $currentRoute = request()->path();
        @endphp

        <li class="bold {{ $currentRoute === '/' ? 'active-link' : '' }}">
            <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i><span>Home</span></a>
        </li>
        <li class="bold {{ $currentRoute === 'projects' ? 'active-link' : '' }}">
            <a href="{{ route('projects') }}"><i class="fa-solid fa-rectangle-list"></i><span>Projects</span></a>
        </li>
        <li class="bold {{ $currentRoute === 'skills' ? 'active-link' : '' }}">
            <a href="{{ route('skills') }}"><i class="fa-solid fa-chart-simple"></i><span>Skills</span></a>
        </li>
        <li class="bold {{ $currentRoute === 'blog' ? 'active-link' : '' }}">
            <a href="{{ route('blog') }}"><i class="fa-solid fa-pen"></i><span>Blog</span></a>
        </li>
        <li class="bold {{ $currentRoute === 'aboutme' ? 'active-link' : '' }}">
            <a href="{{ route('aboutme') }}"><i class="fa-solid fa-user"></i><span>About Me</span></a>
        </li>
        <li class="bold {{ $currentRoute === 'contactme' ? 'active-link' : '' }}">
            <a href="{{ route('contactme') }}"><i class="fa-solid fa-envelope"></i><span>Contact Me</span></a>
        </li>
        <li class="bold">
            <button id="theme-toggle" class="theme-toggle">
                <i class="fa-solid fa-circle-half-stroke"></i>
                <span>Toggle Theme</span>
            </button>
        </li>
    </ul>
    
</nav>
