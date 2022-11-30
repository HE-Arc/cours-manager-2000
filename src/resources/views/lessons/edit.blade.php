@extends('layout.app')

@section('content')
    <a class="btn btn-outline-light" href="{{ route('lessons.index') }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier une Leçon
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="row mt-3">

                        <div class="form-group col-4">
                            <label for="inputCourse">Cours</label>
                            <select name="course_id" id="inputCourse">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label for="inputDay">Jour</label>
                            <select name="day" id="inputDay">
                                @foreach ($days as $day)
                                    <option value="{{ $day->value }}" {{ $lesson->day == $day->value ? 'selected' : '' }}>
                                        {{ $day->stringDay() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label for="inputClass">Classe</label>
                            <select name="class_id" id="inputClass">
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ $lesson->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="form-group col-6">
                            <label for="inputStartPeriod">Période de début</label>
                            <select name="period_id" id="inputStartPeriod">
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}"
                                        {{ $lesson->period_id == $period->id ? 'selected' : '' }}>
                                        {{ $period->start_time }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="inputNbPeriods">Nombre de périodes</label>
                            <input type="text" name="nb_periods" value="{{ $lesson->nb_periods }}" class="form-control"
                                id="inputNbPeriods">
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="form-group col-6">
                            <label for="inputProfessor">Professeur</label>
                            <input type="text" name="professor" value="{{ $lesson->professor }}" class="form-control"
                                id="inputProfessor">
                        </div>

                        <div class="form-group col-6">
                            <label for="inputClassroom">Salle</label>
                            <input type="text" name="classroom" value="{{ $lesson->classroom }}" class="form-control"
                                id="inputClassroom">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>
    @endsection
