@extends('layout.app')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('courses.index') }}"><i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Afficher un cours
                </div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="row mt-3">

                            <div class="form-group col-4">
                                <strong>Jour :</strong>
                                {{ $lesson->day }}
                            </div>

                            <div class="form-group col-4">
                                <strong>Cours :</strong>
                                {{ $lesson->course->name ?? 'Cours inconnu...' }}
                            </div>

                            <div class="form-group col-4">
                                <strong>Classe :</strong>
                                {{ $lesson->class->name ?? 'Classe inconnue...' }}
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="form-group col-6">
                                <strong>Période de début :</strong>
                                {{ $lesson->start_period->start_time ?? 'Période inconnue...' }}
                            </div>

                            <div class="form-group col-6">
                                <strong>Nombre de périodes :</strong>
                                {{ $lesson->nb_periods }}
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="form-group col-6">
                                <strong>Professeur :</strong>
                                {{ $lesson->professor }}
                            </div>

                            <div class="form-group col-6">
                                <strong>Salle :</strong>
                                {{ $lesson->classroom }}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <ul>
                @foreach ($course->grades as $grade)
                    <li>
                        <a href="{{ route('grades.show', $grade->id) }}">{{ $grade->value }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
