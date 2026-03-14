<div class="terminal-frame">
    {{-- Title bar --}}
    <header class="terminal-titlebar">
        {{-- Traffic-light dots (decorative) --}}
        <div class="terminal-dots" aria-hidden="true">
            <span class="terminal-dot--red"></span>
            <span class="terminal-dot--yellow"></span>
            <span class="terminal-dot--green"></span>
        </div>

        {{-- Tab navigation --}}
        <nav class="terminal-tabs" :data-open="mobileMenu ? 'true' : 'false'" @click.outside="mobileMenu = false">
            @foreach ($tabs as $tab)
                <a href="{{ $tab['href'] }}"
                   class="terminal-tab {{ $isActive($tab) ? 'terminal-tab--active' : '' }}"
                   @click="mobileMenu = false">
                    {{ $tab['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right side: theme toggle + hamburger --}}
        <div class="terminal-titlebar-right">
            <button class="theme-toggle"
                    @click="$dispatch('toggle-theme')"
                    :title="theme === 'dark' ? 'Switch to light theme' : 'Switch to dark theme'"
                    aria-label="Toggle theme">
                <span x-text="theme === 'dark' ? '☀️' : '🌙'"></span>
            </button>

            <button class="hamburger"
                    @click="mobileMenu = !mobileMenu"
                    :aria-expanded="mobileMenu ? 'true' : 'false'"
                    aria-label="Toggle navigation">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </header>

    {{-- Page content --}}
    <main class="terminal-body">
        <div class="page-content @yield('content-class')">
            {{ $slot }}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="terminal-footer">
        <span>&copy; {{ date('Y') }} Rishan Thirukumar</span>
        <span>&middot;</span>
        <a href="https://github.com/rishan-tk/" target="_blank" rel="noopener">GitHub</a>
        <span>&middot;</span>
        <a href="https://www.linkedin.com/in/rishan-thirukumar/" target="_blank" rel="noopener">LinkedIn</a>
    </footer>
</div>
