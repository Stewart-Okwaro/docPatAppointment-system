<!-- resources/views/patient/create.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add New Patient</h2>

    <form action="{{ route('patient.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="medical_history">Medical History:</label>
            <textarea class="form-control" id="medical_history" name="medical_history" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="patient_case">Patient Case:</label>
            <textarea class="form-control" id="patient_case" name="patient_case" rows="3" required></textarea>
        </div>

        {{-- Add more fields as needed --}}

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
