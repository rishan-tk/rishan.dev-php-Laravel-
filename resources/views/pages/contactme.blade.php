@extends('layouts.app')

@section('title', 'Contact Me')
@section('meta_description', 'Get in touch with Rishan — contact form and links for projects, skills, and more.')

@section('content')
<div class="heading">
    <h1>CONTACT ME</h1>
    @include('components.mobile-menu-button')
</div>

<div class="main-content">
    <div class="contact-intro">
        <p>Welcome to my portfolio website. Thank you for taking the time to explore my work and expertise. If you haven’t already, feel free to visit my projects via:</p>
        <p><a href="{{ route('projects') }}"><i class="fa-solid fa-rectangle-list px-2"></i><span>Projects</span></a></p>

        <p>And related skills via:</p>
        <p><a href="{{ route('skills') }}"><i class="fa-solid fa-chart-simple px-2"></i><span>Skills</span></a></p>

        <p>And my CV:</p>
        <p><a href="{{ asset('cv/CV.pdf') }}" target="_blank">Download CV</a></p>

        <p>I value meaningful connections and collaborations within the tech community. Whether it's project discussions, inquiries, or professional opportunities, feel free to reach out.</p>
        <p>I’ll respond as soon as possible (usually within a few business days depending on the enquiry).</p>
    </div>

    <div class="contact-form">
        <p>You can contact me by completing this form and pressing submit.</p>
        @include('components.contact-form')
    </div>

    <div class="socials flex flex-col mt-4">
        <div class="caption">
            <p>Alternatively, you can also contact me via email or LinkedIn</p>
        </div>
        <div class="links">
            <ul class="flex">
                <li class="mr-4">
                    <p>Email Address:</p> 
                    <p><a href="mailto:rishan-tk@rishan.dev">rishan-tk@rishan.dev</a></p>
                </li>
                <li>
                    <p>LinkedIn:</p>
                    <a href="https://www.linkedin.com/in/rishan-thirukumar/" target="_blank">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
