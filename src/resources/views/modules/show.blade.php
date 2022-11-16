@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules/show.css') }}">
@endpush

@section('content')

    <div id="module-show-view" class="container mt-5">
        Coucou
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('modules.index') }}"><i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Afficher un module
                </div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <strong>Nom :</strong>
                            {{ $module->name }}
                        </div>

                        <div class="form-group col-12">
                            <strong>Moyenne minimale :</strong>
                            {{ $module->minimal_avg }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <ul>
                @foreach ($module->courses as $course)
                    <li>
                        <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
