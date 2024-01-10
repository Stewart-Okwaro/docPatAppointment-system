@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointments Dashboard</h2>

        <form action="{{ route('dashboard.index') }}" method="GET">
            <div class="form-row mt-3">
                <div class="col">
                    <label for="date">Select Date:</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="col">
                    <label for="doctor">Select Doctor:</label>
                    <select class="form-control" id="doctor" name="doctor">
                        <option value="">-- Select Doctor --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="patient">Select Patient:</label>
                    <select class="form-control" id="patient" name="patient">
                        <option value="">-- Select Patient --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach($appointmentsWithRelations as $appointment)
    <tr>
        <td>{{ $appointment->appointment_date->format('Y-m-d') }}</td>
        <td>{{ $appointment->doctor->name }}</td>
        <td>{{ $appointment->patient->name }}</td>
    </tr>
@endforeach
            </tbody>
        </table>
        
        <a href="{{ route('dashboard.report') }}" class="btn btn-info mt-3">View Report</a>
    </div>
@endsection
