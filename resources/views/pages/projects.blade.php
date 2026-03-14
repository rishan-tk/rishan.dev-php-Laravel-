@extends('layouts.app')

@section('title', 'Projects — Rishan Thirukumar')
@section('meta_description', 'Personal, academic, and work-in-progress projects by Rishan Thirukumar.')

@section('content')
    @php
        $projects = json_decode(file_get_contents(resource_path('data/projects.json')), true);
        $categories = [
            'personal'  => 'Personal Projects',
            'academic'  => 'Academic Projects',
            'wip'       => 'Work in Progress',
        ];
    @endphp

    <h1 class="fade-in">~/projects</h1>
    <p class="t-muted fade-in" style="margin-bottom: var(--space-lg);">Personal, academic, and work-in-progress projects.</p>

    @foreach ($categories as $key => $label)
        @php $filtered = collect($projects)->where('category', $key)->values(); @endphp
        @if ($filtered->isNotEmpty())
            <section style="margin-bottom: var(--space-xl);">
                <h2 class="fade-in" style="margin-bottom: var(--space-md);">{{ $label }}</h2>
                <div class="card-grid">
                    @foreach ($filtered as $project)
                        <a href="/projects/{{ $project['slug'] }}" class="card fade-in" style="text-decoration: none;">
                            <div class="card-title">{{ $project['title'] }}</div>
                            <p class="card-desc">{{ $project['description'] }}</p>
                            <div class="card-tags">
                                @foreach ($project['tags'] as $tag)
                                    <span class="card-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="card-footer" style="margin-top: var(--space-sm);">
                                @if (!empty($project['live']))
                                    <span class="t-green" style="font-family: var(--font-mono); font-size: var(--text-xs);">● live</span>
                                @elseif ($project['category'] === 'wip')
                                    <span class="t-amber" style="font-family: var(--font-mono); font-size: var(--text-xs);">⧗ in progress</span>
                                @else
                                    <span class="t-muted" style="font-family: var(--font-mono); font-size: var(--text-xs);">◎ completed</span>
                                @endif
                                @if (!empty($project['github']))
                                    <span class="t-cyan" style="font-family: var(--font-mono); font-size: var(--text-xs);">⎇ GitHub</span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    @endforeach
@endsection
