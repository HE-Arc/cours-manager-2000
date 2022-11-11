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
                <img src="https://pngimg.com/uploads/hedgehog/hedgehog_PNG18.png">
            </div>
        </a>
        <a href="#" class="cm-card">
            <div class="cm-gradient"></div>
            <div class="cm-title">
                <h1>Horaire</h1>
            </div>
            <div class="cm-content">
                <img src="https://www.pngkey.com/png/full/435-4355650_sea-otter.png">
            </div>
        </a>
    </div>
@endsection
