@extends('layout.app')

@section('content')
    <h1>Bulletin</h1>
    <br>

    @foreach ($modules as $module)
        <table class="table">
            <thead>
                <tr>
                    <th style="width:50%" scope="col">Module : {{ $module->name }}</th>
                    <th style="width:15%">Pondération</th>
                    <th style="width:20%" scope="col">Moyenne : {{ $module->mean() }}</th>
                    <th style="width:15%" scope="col">{{ $module->isPassed() ? 'Acquis' : 'Echec' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($module->courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->weighting }}</td>
                        <td>{{ $course->mean() }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection
