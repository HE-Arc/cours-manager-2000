@extends('layout.app')

@section('content')

    <a class="btn btn-outline-light" href="{{ route('courses.index') }}"><i class="fa-solid fa-angles-left"></i></a>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Nouveau Cours
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputName">Nom</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="inputName">
                            </div>
                            <div class="form-group col-12">
                                <label for="inputModule">Module</label>
                                <select name="module_id" id="inputModule">
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="inputWeighting">Pondération</label>
                                    <input type="text" name="weighting" value="{{ old('weighting') }}"
                                        class="form-control" id="inputWeighting">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputMinimalAVG">Note minimale</label>
                                    <input type="text" name="minimal_avg" value="{{ old('minimal_avg') }}"
                                        class="form-control" id="inputMinimalAVG">
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

                            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
