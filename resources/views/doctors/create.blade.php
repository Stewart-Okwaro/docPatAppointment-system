@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add New Doctor</h2>

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" id="specialization" name="specialization" required>
        </div>

        {{-- Add more fields as needed --}}

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
