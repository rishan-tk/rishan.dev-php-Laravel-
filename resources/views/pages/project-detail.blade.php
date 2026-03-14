@extends('layouts.app')

@section('title', ($project['title'] ?? 'Project') . ' — Rishan Thirukumar')
@section('meta_description', $project['description'] ?? 'Project details')

@section('content')
    <h1 class="fade-in">{{ $project['title'] ?? 'Project' }}</h1>

    @if (!empty($project['tags']))
        <div class="card-tags fade-in" style="margin-bottom: var(--space-md);">
            @foreach ($project['tags'] as $tag)
                <span class="card-tag">{{ $tag }}</span>
            @endforeach
        </div>
    @endif

    <div class="project-detail fade-in">
        {{-- Auto-generated TOC --}}
        @if (!empty($project['blocks']))
            @php
                $headings = collect($project['blocks'])->where('type', 'heading');
            @endphp
            @if ($headings->isNotEmpty())
                <nav class="project-toc">
                    <h3>Contents</h3>
                    <ul>
                        @foreach ($headings as $heading)
                            <li>
                                <a href="#{{ Str::slug($heading['text']) }}">{{ $heading['text'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endif
        @endif

        {{-- Content blocks --}}
        <div class="project-content">
            @foreach ($project['blocks'] ?? [] as $block)
                @if ($block['type'] === 'heading')
                    <h2 id="{{ Str::slug($block['text']) }}">{{ $block['text'] }}</h2>
                @elseif ($block['type'] === 'text')
                    <p>{{ $block['content'] }}</p>
                @elseif ($block['type'] === 'image')
                    <img src="{{ asset($block['src']) }}" alt="{{ $block['alt'] ?? '' }}" loading="lazy">
                @elseif ($block['type'] === 'list')
                    <ul>
                        @foreach ($block['items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @elseif ($block['type'] === 'link')
                    <p><a href="{{ $block['href'] }}" target="_blank" rel="noopener">{{ $block['text'] }}</a></p>
                @endif
            @endforeach
        </div>
    </div>
@endsection
