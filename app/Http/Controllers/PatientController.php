<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth'); // Apply 'auth' middleware to all methods in this controller
    }
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Get the selected number of rows or default to 10

        // Fetch unique patient names
        $names = Patient::pluck('name')->unique();

        $patients = Patient::paginate($perPage);

        return view('patient.index', compact('patients', 'names'));
    }

    

 
    // Show the form for creating a new patient
    public function create()
    {
        return view('patient.create');
    }

    // Store a newly created patient in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            'medical_history' => 'sometimes|nullable|string', 
            'patient_case' => 'sometimes|nullable|string', 
            // Add more fields as needed
        ]);

        // Create a new patient with the validated data
        Patient::create($validatedData);

        return redirect()->route('patient.index')->with('success', 'Patient added successfully');
    }

    // Show the form for editing a patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.edit', compact('patient'));
    }

    // Update the specified patient in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            'medical_history' => 'sometimes|nullable|string', 
            'patient_case' => 'sometimes|nullable|string',
            // Add more fields as needed
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        return redirect()->route('patient.index')->with('success', 'Patient updated successfully');
    }

    // Remove the specified patient from the database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient.index')->with('success', 'Patient deleted successfully');
    }
         // Show the details of a specific patient
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.view', compact('patient'));
    }
    
}
