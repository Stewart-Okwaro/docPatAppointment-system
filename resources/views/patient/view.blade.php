<!-- resources/views/patient/view.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <h2>View Patient</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Patient Details</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> {{ $patient->name }}</li>
                <li class="list-group-item"><strong>Date of Birth:</strong> {{ $patient->dob }}</li>
                <li class="list-group-item"><strong>Phone:</strong> {{ $patient->phone }}</li>
                <li class="list-group-item"><strong>Medical History:</strong> {{ $patient->medical_history }}</li>
                <li class="list-group-item"><strong>Patient Case:</strong> {{ $patient->patient_case }}</li>
                {{-- Add more details as needed --}}
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('patient.index') }}" class="btn btn-primary">Back to Patients</a>
    </div>
</div>

@endsection
