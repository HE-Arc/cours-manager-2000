@extends('layout.app')

@section('content')

    <a class="btn btn-outline-light" href="{{ route('modules.index') }}"><i class="fa-solid fa-angles-left"></i></a>


    <form action="{{ route('modules.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Nouveau Module
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-12">
                                <label for="inputName">Nom</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="inputName">
                            </div>

                            <div class="form-group col-12">
                                <label for="inputMinAvg">Moyenne minimale</label>
                                <input type="text" name="minimal_avg" value="{{ old('minimal_avg') }}"
                                    class="form-control" id="inputMinAvg">
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
