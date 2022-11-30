@extends('layout.app')

@section('content')
    <a class="btn btn-outline-light" href="{{ route('grades.index') }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier une Note
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputValue">Valeur</label>
                        <input type="text" name="value" value="{{ $grade->value }}" class="form-control"
                            id="inputValue">
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="inputCoeff">Coefficient</label>
                            <input type="text" name="coeff" value="{{ $grade->coeff }}" class="form-control"
                                id="inputCoeff">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>
    @endsection
