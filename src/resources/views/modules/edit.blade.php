@extends('layout.app')

@section('content')
    <a class="btn btn-outline-light" href="{{ route('modules.index') }}"><i class="fa-solid fa-angles-left"></i></a>

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
