@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules/index.css') }}">
@endpush

@section('content')
    <h1>Modules</h1>

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
@endsection
