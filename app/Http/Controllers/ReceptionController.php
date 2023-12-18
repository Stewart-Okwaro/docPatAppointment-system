<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class ReceptionController extends Controller
{
    // Display a listing of patients
    public function index()
    {
        $patients = Patient::paginate(10); // 10 patients per page by default
        return view('reception.index', compact('patients'));
    }

    // Show the form for creating a new patient
    public function create()
    {
        return view('reception.create');
    }

    // Store a newly created patient in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            // Add more fields as needed
        ]);

        // Create a new patient with the validated data
        Patient::create($validatedData);

        return redirect()->route('reception.index')->with('success', 'Patient added successfully');
    }

    // Show the form for editing a patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('reception.edit', compact('patient'));
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

        return redirect()->route('reception.index')->with('success', 'Patient updated successfully');
    }

    // Remove the specified patient from the database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('reception.index')->with('success', 'Patient deleted successfully');
    }
}
