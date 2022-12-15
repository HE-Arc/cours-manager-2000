@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light" href="{{ route('home') }}"><i class="fa-solid fa-angles-left"></i></a>
        Cours
    </h1>

    <a href="{{ route('courses.create') }}" class="btn btn-outline-primary float-right mb-2">
        <i class="bi bi-plus-square-fill"></i>
        Ajouter un cours
    </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Indicateur</th>
                <th scope="col">Nom</th>
                <th scope="col">Module</th>
                <th scope="col">Pondération</th>
                <th scope="col">Note minimale</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->indicator }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->module->name ?? 'Module inconnu...' }}</td>
                    <td>{{ $course->weighting }}</td>
                    <td>{{ $course->minimal_avg }}</td>
                    <td>
                        {{-- <a class="btn btn-outline-info" href="{{ route('courses.show', $course->id) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a> --}}
                        <a class="btn btn-outline-primary" href="{{ route('courses.edit', $course->id) }}">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form class="d-inline-flex" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
