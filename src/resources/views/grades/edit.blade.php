@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}">
@endpush

@section('content')
    <a class="btn btn-outline-light" href="{{ route('courses.show', $grade->course->id) }}"><i
            class="fa-solid fa-angles-left"></i></a>



    <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card-header">
            Modifier une Note
        </div>
        <div class="card-body">
            <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">

                    <div class="row">

                        <div class="form-group col-6">
                            <label for="inputValue">Valeur</label>
                            <input type="text" name="value" value="{{ $grade->value }}" class="form-control"
                                id="inputValue">
                        </div>

                        <div class="form-group col-6">
                            <label for="inputCoeff">Coefficient</label>
                            <input type="text" name="coeff" value="{{ $grade->coeff }}" class="form-control"
                                id="inputCoeff">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-outline-light btn-block mt-3">Modifier</button>
                </div>
            </form>

            <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-block mt-3"><i class="bi bi-trash-fill"></i>
                    Supprimer</button>
            </form>
        </div>
    </div>
@endsection
