@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <div class="cm-login">
        <form class="needs-validation cm-login-form" action="{{ route('user.authentificate') }}" method="POST" novalidate>
            @csrf

            <h1>Bienvenue</h1>

            <div class="cm-input-box">
                <input type="email" name="email" required />
                <span>Email</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>
            <div class="cm-input-box">
                <input type="password" name="password" required />
                <span>Mot de passe</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <a href="#">Mot de passe oublié ?</a>

            <button type="submit" class="cm-button">
                <span class="left"></span>
                <span class="top"></span>
                <span class="right"></span>
                <span class="bottom"></span>
                Connexion
            </button>

            <div class="cm-divider">ou</div>

            <a href="{{ route('user.create') }}" class="cm-button">
                <span class="left"></span>
                <span class="top"></span>
                <span class="right"></span>
                <span class="bottom"></span>
				Créer un compte
            </a>
        </form>
    </div>
@endsection

@push('customjs')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endpush
