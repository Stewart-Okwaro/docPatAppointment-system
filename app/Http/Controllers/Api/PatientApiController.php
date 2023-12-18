<?php

// app/Http/Controllers/Api/PatientApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;

class PatientApiController extends Controller
{
    // Display a listing of patients
    public function index()
    {
        $patients = Patient::all();
        return PatientResource::collection($patients);
    }

    // Display the specified patient
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return new PatientResource($patient);
    }

    // Store a newly created patient in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            // Add more fields as needed
        ]);

        $patient = Patient::create($validatedData);

        return new PatientResource($patient);
    }

    // Update the specified patient in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            // Add more fields as needed
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        return new PatientResource($patient);
    }

    // Remove the specified patient from the database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}
