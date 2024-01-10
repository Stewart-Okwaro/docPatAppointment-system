{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointment Details</h2>

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $appointment->id }}</dd>

            <dt class="col-sm-3">Date</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_date }}</dd>

            <dt class="col-sm-3">Time</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_time }}</dd>

            <dt class="col-sm-3">Doctor</dt>
            <dd class="col-sm-9">{{ $appointment->doctor->name }}</dd>

            <dt class="col-sm-3">Patient</dt>
            <dd class="col-sm-9">{{ $appointment->patient->name }}</dd>

            <dt class="col-sm-3">Created At</dt>
            <dd class="col-sm-9">{{ $appointment->created_at }}</dd>

            <dt class="col-sm-3">Updated At</dt>
            <dd class="col-sm-9">{{ $appointment->updated_at }}</dd>
        </dl>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointment Details</h2>

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $appointment->id }}</dd>

            <dt class="col-sm-3">Date</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_date }}</dd>

            <dt class="col-sm-3">Time</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_time }}</dd>

            <dt class="col-sm-3">Doctor</dt>
            <dd class="col-sm-9">{{ $appointment->doctor->name }}</dd>

            <dt class="col-sm-3">Patient</dt>
            <dd class="col-sm-9">{{ $appointment->patient->name }}</dd>

            <dt class="col-sm-3">Created At</dt>
            <dd class="col-sm-9">{{ $appointment->created_at }}</dd>

            <dt class="col-sm-3">Updated At</dt>
            <dd class="col-sm-9">{{ $appointment->updated_at }}</dd>
        </dl>

        <div class="mt-3">
            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
