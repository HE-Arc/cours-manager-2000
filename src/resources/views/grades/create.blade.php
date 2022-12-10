@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}">
@endpush

@section('content')

    <a class="btn btn-outline-light" href="{{ route('courses.show', $courseId) }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('grades.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">

                    <div class="card-header">
                        Nouvelle Note
                    </div>

                    <div class="card-body">
                        <div class="form-row">

                            <input type="hidden" name="course_id" value="{{ $courseId }}" />

                            <div class="row">

                                <div class="form-group col-6">
                                    <label for="inputValue">Valeur</label>
                                    <input type="text" name="value" value="{{ old('value') }}" class="form-control"
                                        id="inputValue">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputCoeff">Coefficient</label>
                                    <input type="text" name="coeff" value="{{ old('coeff') }}" class="form-control"
                                        id="inputCoeff">
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
