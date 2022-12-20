@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user/timetable.css') }}">
@endpush

@section('content')
    <div class="cm-timetable">
        <div class="cm-days">
            @foreach ($days as $day)
                <div class="cm-day">
                    {{ $day->stringDay() }}
                </div>
            @endforeach
        </div>
        <div class="cm-grid">
            @foreach ($days as $day)
                <table class="cm-table">
                    <tbody>
                        @foreach ($timetable[strval($day->value)] as $tTable)
                            <tr class="cm-table-row">
                                <td rowspan="{{ $tTable->getNbPeriods() }}">
                                    @if ($tTable->getCourseName() !== '')
                                        <div class="cm-table-card">
                                            <div class="cm-card-title">
                                                {{ $tTable->getCourseName() }}
                                            </div>
                                            <div class="cm-card-subtitle"
                                                <span>{{ $tTable->getStartTime() }} - {{ $tTable->getEndTime() }}</span>
                                                <span>{{ $tTable->getCourseProfessor() }}</span>
                                            </div>
                                            <div class="cm-card-details">
                                                {{ $tTable->getCourseClassroom() }}
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @for ($k = 0; $k < $tTable->getNbPeriods() - 1; $k++)
                                {{-- Empty rows used by "rowspan" --}}
                                <tr class="cm-table-row"></tr>
                            @endfor
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
