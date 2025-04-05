@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Home page description')

@section('content')
    @include('components.mobile-menu-button')

    <div class="main-content">
        @include('components.homepage-banner')

        {{-- Optional future content (uncomment if needed) --}}
        {{--
        <p>Purpose for this website</p>
        <p>Brief summary about skills and passions</p>

        <p>You can view the list of skills I have acquired over my time programming.</p>
        <a href="{{ route('skills') }}"><i class="fa-solid fa-rectangle-list"></i><span>Skills</span></a>

        <p>You can view some of the projects I have worked on to showcase some of my skills</p>
        <a href="{{ route('projects') }}"><i class="fa-solid fa-rectangle-list"></i><span>Projects</span></a>

        <p>The brief from about me section</p>
        <a href="{{ route('aboutme') }}"><i class="fa-solid fa-rectangle-list"></i><span>About Me</span></a>

        <p>I will soon be starting my own blog about technologies I am currently interested in and researching.</p>
        <a href="{{ route('blog') }}"><i class="fa-solid fa-rectangle-list"></i><span>Blog</span></a>
        --}}
    </div>
@endsection
