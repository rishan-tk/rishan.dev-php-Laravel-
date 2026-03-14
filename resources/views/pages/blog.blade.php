@extends('layouts.app')

@section('title', 'Blog — Rishan Thirukumar')
@section('meta_description', 'Tech blog — coming soon.')

@section('content')
    <div style="margin-top: var(--space-xl);">
        <pre style="font-family: var(--font-mono);"><span class="t-amber">rishan@dev:~/blog$</span> <span class="t-white">ls</span></pre>
        <pre style="font-family: var(--font-mono);"><span class="t-muted">total 0</span></pre>
        <pre style="font-family: var(--font-mono); margin-top: var(--space-sm);"><span class="t-amber">rishan@dev:~/blog$</span> <span class="t-white">cat README.md</span></pre>
        <pre style="font-family: var(--font-mono);"><span class="t-green">Blog coming soon. Currently loading modules...</span></pre>
        <p class="t-muted" style="margin-top: var(--space-lg); font-family: var(--font-sans);">
            Planning to write about Laravel, Linux, graphics programming, and other things I'm working on. Check back later.
        </p>
    </div>
@endsection
