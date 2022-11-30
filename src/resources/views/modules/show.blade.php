@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules/show.css') }}">
@endpush

@section('content')
    <div id="module-show-view" class="container">
        <div class="cm-card-infos">
            <div class="cm-card-title h3">
                Titre
            </div>
            <div class="cm-card-content">
                Content
            </div>
        </div>
        <div class="cm-courses-container">
            @foreach ($module->courses as $course)
                <a href="{{ route('courses.show', $course->id) }}"
                    class="cm-card {{ $course->isPassed() ? '' : 'cm-unsuccess' }}">
                    <div class="cm-card-title h3">
                        <div class="cm-card-title-truncate">
                            {{ $course->name }}
                        </div>
                        <span>{{ $module->id }}.{{ $course->id }}</span>
                        <span class="cm-failure">ÉCHEC</span>
                    </div>
                    <div class="cm-card-content">
                        <div>
                            <span data-toggle="tooltip" data-placement="top" title="Moyenne">
                                <i class="fa-solid fa-calculator"></i>
                            </span>
                            <div>
                                {{ sprintf('%01.2f', $course->mean()) }}
                            </div>
                        </div>
                        <div>
                            <span data-toggle="tooltip" data-placement="top" title="Pondération">
                                <i class="fa-solid fa-scale-unbalanced"></i>
                            </span>
                            <div>
                                {{ $course->weighting }}
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
        <div class="cm-stats-container">
            Statistics
        </div>
    </div>
@endsection
