@extends('layouts.app')

@section('title', 'Skills — Rishan Thirukumar')
@section('meta_description', 'Technical skills: languages, frameworks, tools, and platforms.')

@section('content')
    @php
        $skills = json_decode(file_get_contents(resource_path('data/skills.json')), true);
    @endphp

    <h1 class="fade-in">~/skills</h1>
    <p class="t-muted fade-in" style="margin-bottom: var(--space-lg);">Languages, frameworks, tools, and platforms I work with.</p>

    @foreach ($skills as $category => $items)
        <section class="skills-category fade-in">
            <h2 class="skills-category-title">{{ $category }}</h2>
            <div class="skills-grid">
                @foreach ($items as $skill)
                    <div class="skill-item">
                        <div class="skill-icon">
                            <i class="{{ $skill['icon'] }}"></i>
                        </div>
                        <span class="skill-name">{{ $skill['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
@endsection
