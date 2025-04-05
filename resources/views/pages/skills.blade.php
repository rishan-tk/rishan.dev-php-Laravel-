@extends('layouts.app')

@section('title', 'Skills')
@section('meta_description', 'Skills including C++, Python, Java, HTML, CSS')

@section('content')
<div class="heading">
    <h1>SKILLS</h1>
    @include('components.mobile-menu-button')
</div>

<div class="main-content">
    <div class="skills">
        <h1>Languages:</h1>
        <ul>
            <li>
                <a href="{{ route('projects') }}#projects-4">
                    <div class="logo-img">
                        <img src="{{ asset('img/skills/cpp-logo.png') }}" alt="C++ Logo">
                    </div>
                    <p>C++</p>
                </a>
            </li>
            <li>
                <a href="{{ route('projects') }}#projects-2">
                    <div class="logo-img">
                        <img src="https://www.svgrepo.com/show/376344/python.svg" alt="Python Logo">
                    </div>
                    <p>Python</p>
                </a>
            </li>
            <li>
                <a href="{{ route('projects') }}#projects-1">
                    <div class="logo-img">
                        <img src="{{ asset('img/skills/html5-logo.png') }}" alt="HTML5 Logo">
                    </div>
                    <p>HTML5</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="skills">
        <h1>Frameworks & Libraries:</h1>
        <ul>
            <li>
                <a href="{{ route('projects') }}#projects-2">
                    <div class="logo-img">
                        <img src="https://discordpy.readthedocs.io/en/stable/_images/snake_dark.svg" alt="Discord.py Logo">
                    </div>
                    <p>DiscordBot.py</p>
                </a>
            </li>
            <li>
                <a href="{{ route('projects') }}#projects-3">
                    <div class="logo-img">
                        <img src="https://miro.medium.com/v2/resize:fit:1400/1*lpV49uSTaxnGNRCY99wXkQ.png" alt="Telegram Bot Logo">
                    </div>
                    <p>TelegramBot</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="skills">
        <h1>Tools:</h1>
        <ul>
            <li>
                <div class="logo-img">
                    <img src="{{ asset('img/skills/vscode-logo.png') }}" alt="VS Code Logo">
                </div>
                <p>Visual Studio Code</p>
            </li>
            <li>
                <div class="logo-img">
                    <img src="{{ asset('img/skills/vs-logo.png') }}" alt="Visual Studio Logo">
                </div>
                <p>Visual Studio</p>
            </li>
            <li>
                <div class="logo-img">
                    <img src="{{ asset('img/skills/github-logo.png') }}" alt="GitHub Logo">
                </div>
                <p>GitHub</p>
            </li>
        </ul>
    </div>
</div>
@endsection
