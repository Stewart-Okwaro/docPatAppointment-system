@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointments Report</h2>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_date->format('Y-m-d') }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
