@extends('layouts.app')

@section('title', 'About Me')
@section('meta_description', 'Learn more about Rishan – background, interests, and experience.')

@section('content')
<div class="heading">
    <h1>ABOUT ME</h1>
    @include('components.mobile-menu-button')
</div>

<div class="main-content about-me">
    <p>Welcome to my portfolio! I'm Rishan, a Computer Science graduate with a strong passion for technology, mathematics, and creative problem-solving...</p>

    <h1>My Journey</h1>
    <p>My academic pursuit at the University of East Anglia...</p>

    <h1>Interests and Achievements</h1>
    <p>Beyond the screen, I am a musician at heart...</p>

    <h1>Educational Highlights</h1>
    <h2>University:</h2>
    <p>University of East Anglia</p>

    <h2>Degree:</h2>
    <p>BSc Computer Science</p>

    <h2>Notable Projects:</h2>
    <p>GPU-accelerated rendering of smoke using CUDA and shader pipelines...</p>

    <h1>A Glimpse into the Future</h1>
    <p>Fascinated by Unreal Engine, game physics, and quantum computing...</p>

    <h1>Let's Connect</h1>
    <p>Contact me via the Contact Me page or directly at <a href="mailto:rishan-tk@rishan.dev">rishan-tk@rishan.dev</a>.</p>

    <p>Thank you for visiting my portfolio!</p>
</div>
@endsection
