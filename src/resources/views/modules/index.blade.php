@extends('layout.app')

@section('content')

<h1>Modules</h1>

<a href="{{route('modules.create')}}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus-square-fill"></i> Ajouter un module</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Moyenne minimale</th>
            <th scope="col">Formule</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modules as $module)
        <tr>
            <td>{{$module->name}}</td>
            <td>{{$module->minimal_avg}}</td>
            <td>{{$module->formula}}</td>
            <td>
                <a class="btn btn-info" href="{{route('modules.show', $module->id)}}"><i class="bi bi-eye-fill"></i></a>
                <a class="btn btn-primary" href="{{route('modules.edit', $module->id)}}"><i class="bi bi-pencil-fill"></i></a>
                <form action="{{route('modules.destroy', $module->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $modules->links() !!}

@endsection
