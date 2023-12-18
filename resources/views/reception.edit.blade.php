@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Patient</h2>

    <form action="{{ route('reception.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ $patient->dob }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}" required>
        </div>

        {{-- Add more fields as needed --}}

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

@endsection
