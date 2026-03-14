<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rishan Thirukumar — Portfolio')</title>
    <meta name="description" content="@yield('meta_description', 'Computer Science Graduate & Software Developer — terminal-themed portfolio')">
    <meta name="author" content="Rishan Thirukumar">
    <meta name="theme-color" content="#0d1117">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="/favicon.svg?v=2">

    {{-- Prevent flash of wrong theme --}}
    <script>
      (function(){var t=localStorage.getItem('theme')||'dark';document.documentElement.dataset.theme=t})();
    </script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Devicon for skill icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.17.0/devicon.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body x-data="{ theme: localStorage.getItem('theme') || 'dark', mobileMenu: false }"
      x-init="$watch('theme', val => { document.documentElement.dataset.theme = val; localStorage.setItem('theme', val) })"
      @toggle-theme.window="theme = theme === 'dark' ? 'light' : 'dark'"
      :data-theme="theme">

    @hasSection('raw')
        {{-- Homepage terminal uses its own full-screen layout --}}
        @yield('raw')
    @else
        <x-terminal-frame :path="request()->path()">
            @yield('content')
        </x-terminal-frame>
    @endif

</body>
</html>
