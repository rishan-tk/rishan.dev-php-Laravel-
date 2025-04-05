<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rishan’s Portfolio')</title>
    <meta name="description" content="@yield('meta_description', 'Welcome to my portfolio')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body class="root-div">
    @include('components.navbar')

    <div class="container content">
        @yield('content')
        {{-- Back to top button --}}
        <button x-data="{ visible: false }" x-show="visible"
                x-init="
                    window.addEventListener('scroll', () => {
                        visible = window.scrollY > 300;
                    })
                "
                x-transition @click="window.scrollTo({ top: 0, behavior: 'smooth' })" class="back-to-top" aria-label="Back to top">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('theme-toggle');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.body.classList.add('dark-mode');
            }

            toggleBtn?.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');
                const isDark = document.body.classList.contains('dark-mode');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        });
    </script>

</body>
</html>
