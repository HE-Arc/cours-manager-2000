@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user/register.css') }}">
@endpush

@section('content')
    <div class="cm-register">
        <div class="cm-wave"></div>

        <form class="needs-validation cm-register-form" action="{{ route('user.store') }}" method="POST" novalidate>
            @csrf

            <h1>S'inscrire</h1>

            @if ($errors->any())
                <div class="alert alert-danger mt-3 col-12">
                    <strong>Oups!</strong> Il y a un problème avec vos entrées...<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="cm-input-box">
                <input type="text" name="first_name" required>
                <span>Prénom</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <div class="cm-input-box">
                <input type="text" name="last_name" required>
                <span>Nom</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <div class="cm-input-box">
                <input type="email" name="email" required>
                <span>Email</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <div class="cm-select-box">
                <select name="section_class">
                    <option disabled selected value> -- séléctionnez -- </option>
                    @foreach ($section_classes as $section_class)
                        <option value="{{ $section_class->id }}">{{ $section_class->name }}</option>
                    @endforeach
                </select>
                <span>Classe</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <div class="cm-input-box">
                <input type="password" name="password" required>
                <span>Mot de passe</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <div class="cm-input-box">
                <input type="password" name="password_confirmation" required>
                <span>Répétez mot de passe</span>
                <div class="invalid-feedback">
                    Champ requis
                </div>
            </div>

            <button type="submit" class="cm-button">
                <span class="left"></span>
                <span class="top"></span>
                <span class="right"></span>
                <span class="bottom"></span>
                S'inscrire
            </button>

            <div class="cm-divider">ou</div>

            <a href="{{ route('login') }}" class="cm-button">
                <span class="left"></span>
                <span class="top"></span>
                <span class="right"></span>
                <span class="bottom"></span>
                Se connecter
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
