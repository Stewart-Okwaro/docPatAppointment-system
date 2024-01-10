@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointments</h2>

        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add New Appointment</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('appointments.index') }}" method="GET">
            <div class="form-row mt-3">
                <div class="col">
                    <label for="doctor_id">Select Doctor:</label>
                    <select name="doctor_id" id="doctor_id" class="form-control">
                        <option value="">-- Select Doctor --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="patient_id">Select Patient:</label>
                    <select name="patient_id" id="patient_id" class="form-control">
                        <option value="">-- Select Patient --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ request('patient_id') == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
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
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                    <th>Actions</th> <!-- Add this column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_date->format('Y-m-d') }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $appointments->appends(request()->except('page'))->links('pagination::bootstrap-4') }}

    </div>
@endsection
