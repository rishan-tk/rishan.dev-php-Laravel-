@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Tech blog about things I\'m learning, working on, interested in, and updates I follow.')

@section('content')
    <div class="heading">
        <h1>BLOG</h1>
        @include('components.mobile-menu-button')
    </div>

    <div class="main-content">
        <p>
            Tech blog about things I'm learning, working on, interested in, and updates I follow.
        </p>
    </div>
@endsection
