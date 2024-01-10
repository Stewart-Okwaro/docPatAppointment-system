@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Appointment</h2>

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
            </div>

            <div class="form-group">
                <label for="doctor_id">Doctor:</label>
                <select class="form-control" id="doctor_id" name="doctor_id" required>
                    <option value="" disabled selected>Select Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="patient_id">Patient:</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                    <option value="" disabled selected>Select Patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Add more fields as needed --}}

            <button type="submit" class="btn btn-primary">Create Appointment</button>
        </form>
    </div>
@endsection
