@extends("layout.app")
@section("content")

<h1>Cours Manager 2000</h1>

<div class="container">
    <div class="cm-card">
        <a href={{ route('modules.index') }}>Modules</a>
    </div>
    <div class="cm-card">
        <a href="#">Horaire</a>
    </div>
</div>

@endsection
