<?php

// app/Http/Controllers/Api/AppointmentApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;

class AppointmentApiController extends Controller
{
    // Display a listing of appointments
    public function index()
    {
        $appointments = Appointment::all();
        return AppointmentResource::collection($appointments);
    }

    // Display the specified appointment
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return new AppointmentResource($appointment);
    }

    // Store a newly created appointment in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
            // Add more fields as needed
        ]);

        $appointment = Appointment::create($validatedData);

        return new AppointmentResource($appointment);
    }

    // Update the specified appointment in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
            // Add more fields as needed
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);

        return new AppointmentResource($appointment);
    }

    // Remove the specified appointment from the database
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
