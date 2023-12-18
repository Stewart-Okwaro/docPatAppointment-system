@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Doctors</h2>

    <a href="{{ route('doctor.create') }}" class="btn btn-primary">Add New Doctor</a>

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
                <th>Specialization</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>
                    <a href="{{ route('doctor.show', $doctor->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $doctors->links() }} {{-- Pagination links --}}
</div>

@endsection
