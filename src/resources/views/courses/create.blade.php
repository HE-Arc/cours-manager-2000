@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}">
@endpush

@section('content')
    <a class="btn btn-outline-light" href="{{ route('courses.index') }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Nouveau Cours
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="row">
                        <div class="form-group col-9">
                            <label for="inputName">Nom</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="inputName">
                        </div>

                        <div class="form-group col-3">
                            <label for="inputIndicator">Indicateur</label>
                            <input type="text" name="indicator" value="{{ old('indicator') }}" class="form-control"
                                id="inputIndicator">
                        </div>
                    </div>

                    <div class="input-group col-12 mt-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputModule">Module</label>
                        </div>
                        <select class="custom-select" name="module_id" id="inputModule">
                            @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col-6">
                            <label for="inputWeighting">Pondération</label>
                            <input type="text" name="weighting" value="{{ old('weighting') }}" class="form-control"
                                id="inputWeighting">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputMinimalAVG">Note minimale</label>
                            <input type="text" name="minimal_avg" value="{{ old('minimal_avg') }}" class="form-control"
                                id="inputMinimalAVG">
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

                    <button type="submit" class="btn btn-outline-light btn-block mt-3">Créer</button>
                </div>
            </div>
        </div>
    </form>

@endsection
