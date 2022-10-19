@extends('layout.app')
@section('content')


<form action="{{ route('user.authentificate') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="firstname" class="form-label">Prénom</label>
      <input type="text" class="form-control" name="firstname" id="firstname">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>

    <button type="submit" class="btn btn-primary">S'authentifier</button>
</form>

@endsection
