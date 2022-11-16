@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('courses.index') }}"><i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier un Cours
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputName">Nom</label>
                        <input type="text" name="name" value="{{ $course->name }}" class="form-control"
                            id="inputName">
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="inputWeighting">Pondération</label>
                            <input type="text" name="weighting" value="{{ $course->weighting }}" class="form-control"
                                id="inputWeighting">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputMinimalAVG">Note minimale</label>
                            <input type="text" name="minimal_avg" value="{{ $course->minimal_avg }}" class="form-control"
                                id="inputMinimalAVG">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>
    @endsection
