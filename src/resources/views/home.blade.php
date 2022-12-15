@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h1>Cours Manager 2000</h1>

    <div id="home-view" class="container mt-5">
        <a href="{{ route('modules.index') }}" class="cm-card">
            <div class="cm-gradient"></div>
            <div class="cm-title">
                <h1>Modules</h1>
            </div>
            <div class="cm-content">
                <img alt="[hedgehog]" src="{{ asset('img/hedgehog.png') }}">
            </div>
        </a>
        @if (Auth::user()->admin)
            <a href="{{ route('courses.index') }}" class="cm-card">
                <div class="cm-gradient"></div>
                <div class="cm-title">
                    <h1>Cours</h1>
                </div>
                <div class="cm-content">
                    <img alt="[sea otter]" src="{{ asset('img/sea-otter.png') }}">
                </div>
            </a>

            <a href="{{ route('lessons.index') }}" class="cm-card">
                <div class="cm-gradient"></div>
                <div class="cm-title">
                    <h1>Leçons</h1>
                </div>
                <div class="cm-content">
                    <img alt="[sea otter]" src="{{ asset('img/koala.png') }}">
                </div>
            </a>
        @else
            <a href="{{ route('timetable') }}" class="cm-card">
                <div class="cm-gradient"></div>
                <div class="cm-title">
                    <h1>Horaire</h1>
                </div>
                <div class="cm-content">
                    <img alt="[sea otter]" src="{{ asset('img/sea-otter.png') }}">
                </div>
            </a>
        @endif
    </div>
@endsection
