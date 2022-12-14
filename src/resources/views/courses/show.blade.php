@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/courses/show.css') }}">
@endpush

@section('content')
    <a class="btn btn-outline-light" href="{{ route('modules.show', $course->module_id) }}">
        <i class="fa-solid fa-angles-left"></i>
    </a>

    <div id="course-show-view" class="container">
        <div class="cm-card-infos">
            <div class="cm-card-title h3">
                {{ $course->name }}
            </div>
            <div class="cm-card-content">
                <div class="cm-card-content-course-passed {{ $course->isPassed() ? 'cm-passed' : 'cm-failed' }}">
                    ➧ Cours {{ $course->isPassed() ? 'Réussi' : 'Échoué' }}
                </div>
                <div>
                    ➧ {{ count($course->grades) }} note(s)
                </div>
                <div>
                    ➧ Moyenne Requise : {{ $course->minimal_avg }}
                </div>
                <div>
                    ➧ Poids dans le module : {{ $course->weighting }}
                </div>
            </div>
        </div>
        <div class="cm-means-container">
            <div class="cm-mean justify-content-center {{ $course->isPassed() ? '' : 'cm-unsuccess' }}">
                <div class="h3 text-center">
                    Moyenne
                </div>
                <div class="text-center h4">
                    {{ $course->mean() }}
                </div>
            </div>
            <div class="cm-mean justify-content-center {{ $course->isPassed() ? '' : 'cm-unsuccess' }}">
                <div class="h3 text-center">
                    Moyenne Arrondie
                </div>
                <div class="text-center h4">
                    {{ round($course->mean(), 1) }}
                </div>
            </div>
        </div>
        <div class="cm-grades-container">
            <table class="table table-dark table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"></th>
                        @foreach ($course->grades as $grade)
                            <th scope="col" class="text-center">
                                <span data-toggle="tooltip" data-placement="top" title="Editer">
                                    <a href="{{ route('grades.edit', $grade->id) }}">
                                        {{ $grade->created_at->format('d/m/Y') }}
                                    </a>
                                </span>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Note</th>
                        @foreach ($course->grades as $grade)
                            <td scope="row" class="text-center">{{ $grade->value }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col">Pondération</th>
                        @foreach ($course->grades as $grade)
                            <td scope="row" class="text-center">{{ $grade->coeff }}</th>
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('grades.create', ['id' => $course->id]) }}" class="cm-button cm-primary">
                <span class="left"></span>
                <span class="top"></span>
                <span class="right"></span>
                <span class="bottom"></span>
                Ajouter Note
            </a>
        </div>
        {{-- pas le temps...
            <div class="cm-stats-container">
            Statistics
        </div> --}}
    </div>
@endsection
