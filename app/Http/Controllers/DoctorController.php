<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // Display a listing of doctors
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('doctor.index', compact('doctors'));
    }

    // Show the form for creating a new doctor
    public function create()
    {
        return view('doctor.create');
    }

    // Store a newly created doctor in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // Add more fields as needed
        ]);

        Doctor::create($validatedData);

        return redirect()->route('doctor.index')->with('success', 'Doctor added successfully');
    }

    // Show the form for editing a doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.edit', compact('doctor'));
    }

    // Update the specified doctor in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // Add more fields as needed
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($validatedData);

        return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully');
    }

    // Remove the specified doctor from the database
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully');
    }
}
