@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Doctor</h2>

    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $doctor->specialization }}" required>
        </div>

        {{-- Add more fields as needed --}}

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

@endsection
