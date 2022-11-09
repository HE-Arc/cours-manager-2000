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
                        <div class="form-group col-12">
                            <strong>Nom :</strong>
                            {{ $course->name }}
                        </div>
                        <div class="form-group col-12">
                            <strong>Module :</strong>
                            {{ $course->module->name ?? 'Module inconnu...' }}
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <strong>Pondération :</strong>
                                {{ $course->weighting }}
                            </div>
                            <div class="form-group col-6">
                                <strong>Note minimale :</strong>
                                {{ $course->minimal_avg }}
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
                    <a href="{{ route("grades.show", $grade->id) }}">{{ $grade->value }}</a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
