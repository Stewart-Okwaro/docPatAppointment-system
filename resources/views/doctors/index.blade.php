{{-- @extends('layouts.app')

@section('content')

<div class="container">
    <h2>Doctors</h2>

    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>

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
                    <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $doctors->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
</div>

@endsection --}}



@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Doctors</h2>

    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('doctors.index') }}" method="GET">
        <div class="form-row mt-3">
            <div class="col">
                <label for="name">Select Doctor's Name:</label>
                <select name="name" id="name" class="form-control">
                    <option value="">-- Select Doctor's Name --</option>
                    @foreach($names as $doctorName)
                        <option value="{{ $doctorName }}" {{ request('name') == $doctorName ? 'selected' : '' }}>
                            {{ $doctorName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="specialization">Select Specialization:</label>
                <select name="specialization" id="specialization" class="form-control">
                    <option value="">-- Select Specialization --</option>
                    @foreach($specializations as $specialization)
                        <option value="{{ $specialization }}" {{ request('specialization') == $specialization ? 'selected' : '' }}>
                            {{ $specialization }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="perPage">Rows per Page:</label>
                <select name="perPage" id="perPage" class="form-control" onchange="this.form.submit()">
                    <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>All</option>
                </select>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>

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
                    <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $doctors->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
</div>

@endsection
