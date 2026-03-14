@extends('layouts.app')

@section('title', 'About Me — Rishan Thirukumar')
@section('meta_description', 'Computer Science Graduate & Software Developer — background, interests, and experience.')

@section('content')
    <h1 class="fade-in">~/aboutme</h1>

    <div class="about-layout" style="margin-top: var(--space-lg);">
        <div class="about-text fade-in">
            <h2>My Journey</h2>
            <p>I'm Rishan, a Computer Science graduate with a strong passion for technology, mathematics, and creative problem-solving. My degree at the University of East Anglia gave me a solid foundation across software engineering, algorithms, systems design, and GPU programming.</p>

            <h2>What I Build</h2>
            <p>I enjoy building things across the stack — from server-hardened production deployments and Laravel backends, to interactive front-ends and low-level graphics pipelines. I like understanding how things work at every layer.</p>

            <h2>Interests &amp; Achievements</h2>
            <p>Beyond software, I'm a musician. I play multiple instruments and find that music and coding share the same creative discipline — structure, precision, and a lot of iteration.</p>
            <p>Fascinated by Unreal Engine, game physics, GPU compute, and whatever else is interesting in tech at any given moment.</p>

            <h2>Let's Connect</h2>
            <p>Find me via the <a href="/contactme">contact page</a> or directly at <a href="mailto:rishan-tk@rishan.dev">rishan-tk@rishan.dev</a>.</p>
        </div>

        <div class="about-info-card fade-in">
            <pre class="t-white t-bold" style="font-family: var(--font-mono);">rishan@dev</pre>
            <pre class="t-muted" style="font-family: var(--font-mono);">-----------</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Name:</span>     Rishan Thirukumar</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Degree:</span>   BSc Computer Science</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Uni:</span>      University of East Anglia</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Location:</span> United Kingdom</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Email:</span>    rishan-tk@rishan.dev</pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">GitHub:</span>   <a href="https://github.com/rishan-tk" target="_blank" rel="noopener">rishan-tk</a></pre>
            <pre style="font-family: var(--font-mono);"><span class="t-cyan">Uptime:</span>   since Dec 2023</pre>
        </div>
    </div>
@endsection
