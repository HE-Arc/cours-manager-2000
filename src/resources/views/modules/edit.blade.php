@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('modules.index') }}"><i class="bi bi-arrow-return-left"></i></a>
        </div>
    </div>

    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier un Module
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-12">
                        <label for="inputName">Nom</label>
                        <input type="text" name="name" value="{{ $module->name }}" class="form-control"
                            id="inputName">
                    </div>

                    <div class="form-group col-12">
                        <label for="inputMinAvg">Moyenne minimale</label>
                        <input type="text" name="minimal_avg" value="{{ $module->minimal_avg }}" class="form-control"
                            id="inputMinAvg">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>
    @endsection
