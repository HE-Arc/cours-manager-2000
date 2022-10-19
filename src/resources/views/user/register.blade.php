@extends('layout.app')
@section('content')


<form action="{{ route('user.create') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="firstname" id="firstname">
      </div>

    <div class="mb-3">
      <label for="name" class="form-label">Nom</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>

    <div class="mb-3">
      <label for="password1" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" name="password1" id="password1">
    </div>

    <div class="mb-3">
        <label for="password2" class="form-label">Répéter le mot de passe</label>
        <input type="password" class="form-control" name="password2" id="password2">
    </div>

    <button type="submit" class="btn btn-primary">S'enregistrer</button>
</form>

@endsection
