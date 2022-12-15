@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light mb-2" href="{{ route('modules.index') }}"><i class="fa-solid fa-angles-left"></i></a>
        Liste des modules
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Note minimale</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->minimal_avg }}</td>
                    @if (Auth::user()->hasModule($module->id))
                        <td>
                            <form class="d-inline-flex" action="{{ route('modules.unsubscribe', $module->id) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">se désabonner</button>
                            </form>
                        </td>
                    @else
                        <td>
                            <form class="d-inline-flex" action="{{ route('modules.subscribe', $module->id) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning">s'abonner</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
