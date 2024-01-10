@extends('layouts.app')

@section('content')

<div class="container">
    <h2>View Doctor</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Doctor Details</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> {{ $doctor->name }}</li>
                <li class="list-group-item"><strong>Specialization:</strong> {{ $doctor->specialization }}</li>
                {{-- Add more details as needed --}}
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('doctors.index') }}" class="btn btn-primary">Back to Doctors</a>
    </div>
</div>

@endsection
