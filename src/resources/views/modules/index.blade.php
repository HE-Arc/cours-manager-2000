@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light" href="{{ route('home') }}"><i class="fa-solid fa-angles-left"></i></a>
        Modules
    </h1>

    @if (Auth::user()->admin)
        <a href="{{ route('modules.create') }}" class="btn btn-outline-primary float-right mb-2">
            <i class="bi bi-plus-square-fill"></i>
            Ajouter un module
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
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
                        <td>
                            <a class="btn btn-outline-primary" href="{{ route('modules.edit', $module->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form class="d-inline-flex" action="{{ route('modules.destroy', $module->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <a class="btn btn-outline-light float-right" href="{{ route('modules.subscription') }}">Inscription aux modules</a>

        <div id="module-index-view" class="container mt-5">
            @foreach ($modules as $module)
                <a href="{{ route('modules.show', $module->id) }}"
                    class="cm-card {{ $module->isPassed() ? '' : 'cm-unsuccess' }}">
                    <div class="cm-card-title px-2 h3">
                        <div>
                            {{ $module->id }}
                        </div>
                        <div>
                            {{ $module->name }}
                        </div>
                    </div>
                    <div class="cm-card-content">
                        <i class="fa-solid fa-calculator"></i>
                        {{ sprintf('%01.2f', $module->mean()) }}
                    </div>
                </a>
            @endforeach
        </div>
    @endif


@endsection
