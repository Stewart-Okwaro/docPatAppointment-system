<!-- resources/views/patient/index.blade.php -->
 {{-- @extends('layouts.app')

@section('content')

<div class="container">
    <h2>Patients</h2>

    <a href="{{ route('patient.create') }}" class="btn btn-primary">Add New Patient</a>

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
                <th>Medical History</th>
                <th>Patient Case</th>
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
                <td>{{ $patient->medical_history }}</td>
                <td>{{ $patient->patient_case }}</td>
                <td  class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-info w-25 p-1">View</a>
                    <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-warning w-25 p-1">Edit</a>
                    <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

     {{ $patients->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
</div>

@endsection --}}
 

@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Patients</h2>

    <a href="{{ route('patient.create') }}" class="btn btn-primary">Add New Patient</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('patients.index') }}" method="GET">
        <div class="form-row mt-3">
            <div class="col">
                <label for="name">Select Patient's Name:</label>
                <select name="name" id="name" class="form-control">
                    <option value="">-- Select Patient's Name --</option>
                    @foreach($names as $patientName)
                        <option value="{{ $patientName }}" {{ request('name') == $patientName ? 'selected' : '' }}>
                            {{ $patientName }}
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
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Medical History</th>
                <th>Patient Case</th>
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
                <td>{{ $patient->medical_history }}</td>
                <td>{{ $patient->patient_case }}</td>
                <td class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $patients->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
</div>

@endsection
 
