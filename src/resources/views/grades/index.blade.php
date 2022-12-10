@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>Notes</h1>

    <a href="{{ route('grades.create') }}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus-square-fill"></i>
        Ajouter une Note</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cours</th>
                <th scope="col">Valeur</th>
                <th scope="col">Coefficient</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->course->name ?? '-' }}</td>
                    <td>{{ $grade->value }}</td>
                    <td>{{ $grade->coeff }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('grades.show', $grade->id) }}"><i
                                class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-primary" href="{{ route('grades.edit', $grade->id) }}"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
