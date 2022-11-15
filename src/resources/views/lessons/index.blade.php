@extends('layout.app')

@section('content')
    <h1>Cours</h1>

    <a href="{{ route('lessons.create') }}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus-square-fill"></i>
        Ajouter une leçon</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Jour</th>
                <th scope="col">Période de début</th>
                <th scope="col">Nb périodes</th>
                <th scope="col">Cours</th>
                <th scope="col">Prof</th>
                <th scope="col">Classe</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->day }}</td>
                    <td>{{ $lesson->period_id ?? 'période inconnue ...' }}</td>
                    <td>{{ $lesson->nb_periods }}</td>
                    <td>{{ $lesson->course_id ?? 'cours inconnue...' }}</td>
                    <td>{{ $lesson->professor }}</td>
                    <td>{{ $lesson->classroom }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('lessons.show', $course->id) }}"><i
                                class="bi bi-eye-fill"></i></a>
                        <a class="btn btn-primary" href="{{ route('lessons.edit', $course->id) }}"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('lessons.destroy', $course->id) }}" method="POST">
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