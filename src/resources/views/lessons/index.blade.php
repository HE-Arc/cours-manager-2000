@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light" href="{{ route('home') }}">
            <i class="fa-solid fa-angles-left"></i>
        </a>
        Leçons
    </h1>

    <a href="{{ route('lessons.create') }}" class="btn btn-outline-primary float-right mb-2">
        <i class="bi bi-plus-square-fill"></i>
        Ajouter une leçon
    </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Jour</th>
                <th scope="col">Période de début</th>
                <th scope="col">Nb périodes</th>
                <th scope="col">Cours</th>
                <th scope="col">Classe</th>
                <th scope="col">Prof</th>
                <th scope="col">Salle</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->string_day() ?? '-' }}</td>
                    <td>{{ $lesson->start_period() ?? '-' }}</td>
                    <td>{{ $lesson->nb_periods }}</td>
                    <td>{{ $lesson->course->name ?? '-' }}</td>
                    <td>{{ $lesson->sectionClass->name ?? '-' }}</td>
                    <td>{{ $lesson->professor }}</td>
                    <td>{{ $lesson->classroom }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('lessons.edit', $lesson->id) }}">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form class="d-inline-flex" action="{{ route('lessons.destroy', $lesson->id) }}" method="POST">
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
