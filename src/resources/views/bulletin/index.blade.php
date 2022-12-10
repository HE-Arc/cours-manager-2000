@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bulletin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light" href="{{ route('home') }}"><i class="fa-solid fa-angles-left"></i></a>
        Bulletin
    </h1>
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
