@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}">
@endpush

@section('content')

    <a class="btn btn-outline-light" href="{{ route('lessons.index') }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Nouvelle leçon
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="input-group col-12 mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputCourse">Cours</label>
                                </div>
                                <select class="custom-select" name="course_id" id="inputCourse">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-12 mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputDay">Jour</label>
                                </div>
                                <select class="custom-select" name="day" id="inputDay">
                                    @foreach ($days as $day)
                                        <option value="{{ $day->value }}">{{ $day->stringDay() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-12 mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputClass">Classe</label>
                                </div>
                                <select class="custom-select" name="class_id" id="inputClass">
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group col-12 mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputStartPeriod">Période de début</label>
                                </div>
                                <select class="custom-select" name="period_id" id="inputStartPeriod">
                                    @foreach ($periods as $period)
                                        <option value="{{ $period->id }}">{{ $period->start_time }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputProfessor">Professeur</label>
                                <input type="text" name="professor" value="{{ old('professor') }}" class="form-control"
                                    id="inputProfessor">
                            </div>

                            <div class="row mt-2">

                                <div class="form-group col-6">
                                    <label for="inputNbPeriods">Nombre de périodes</label>
                                    <input type="text" name="nb_periods" value="{{ old('nb_periods') }}" class="form-control"
                                        id="inputNbPeriods">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputClassroom">Salle</label>
                                    <input type="text" name="classroom" value="{{ old('classroom') }}" class="form-control"
                                        id="inputClassroom">
                                </div>

                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3 col-12">
                                    <strong>Whoops!</strong> Il y a un problème avec vos entrées.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-outline-light btn-block mt-3">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
