@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Patients</h2>

    <a href="{{ route('reception.create') }}" class="btn btn-primary">Add New Patient</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->dob }}</td>
                <td>{{ $patient->phone }}</td>
                <td>
                    <a href="{{ route('reception.show', $patient->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('reception.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reception.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $patients->links() }} {{-- Pagination links --}}
</div>

@endsection
