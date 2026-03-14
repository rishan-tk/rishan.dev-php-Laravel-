@extends('layouts.app')

@section('title', 'Rishan Thirukumar — Portfolio')
@section('meta_description', 'Computer Science Graduate & Software Developer — interactive terminal-themed portfolio.')

@section('raw')
<div class="terminal-page desktop-only"
     x-data="terminal()"
     @click="focusInput()">

    <div class="terminal-output" x-ref="output">
        <template x-for="(line, idx) in history" :key="idx">
            <div x-html="line.html"></div>
        </template>
        <template x-if="loading">
            <div><span class="t-muted">Loading filesystem...</span></div>
        </template>
    </div>

    <div class="terminal-input-line" x-show="!loading && !booting">
        <span class="terminal-prompt" x-html="prompt + '&nbsp;'"></span>
        <input class="terminal-input"
               type="text"
               x-model="input"
               @keydown.enter="execute()"
               @keydown.up.prevent="historyUp()"
               @keydown.down.prevent="historyDown()"
               @keydown.tab.prevent="tabComplete()"
               autocomplete="off"
               autocorrect="off"
               autocapitalize="off"
               spellcheck="false"
               autofocus>
    </div>
</div>

{{-- Mobile fallback (< 768px) --}}
<div class="mobile-only mobile-home">
    <h1 class="t-green">Rishan Thirukumar</h1>
    <p class="mobile-subtitle">Computer Science Graduate &amp; Software Developer</p>
    <p class="mobile-tagline">I build things for the web and beyond.</p>
    <nav class="mobile-nav-commands">
        <a href="/projects"  class="command-link">$ curl projects/</a>
        <a href="/skills"    class="command-link">$ curl skills/</a>
        <a href="/aboutme"   class="command-link">$ curl aboutme/</a>
        <a href="/contactme" class="command-link">$ curl contactme/</a>
    </nav>
</div>
@endsection
