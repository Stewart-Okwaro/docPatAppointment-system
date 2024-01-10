<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // Display a listing of doctors
//   public function index(Request $request)
// {
//     $perPage = $request->input('perPage', 10); // Get the selected number of rows or default to 10

//     $patients = Patient::paginate($perPage);

//     return view('reception.index', compact('patients'));
// }

public function __construct()
{
    $this->middleware('auth'); // Apply 'auth' middleware to all methods in this controller
}

public function index(Request $request)
{
    // Fetch unique names of existing doctors
    $names = Doctor::pluck('name')->unique();

    $query = Doctor::query();
    $specializations = Doctor::pluck('specialization')->unique();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->filled('specialization')) {
        $query->where('specialization', $request->input('specialization'));
    }

    $perPage = $request->input('perPage', 10);

    $doctors = $perPage === 'all' ? $query->get() : $query->paginate($perPage);

    return view('doctors.index', compact('doctors', 'names', 'specializations'));
}


    // Show the form for creating a new doctor
    public function create()
    {
        return view('doctors.create');
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

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully');
    }

    // Show the form for editing a doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
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

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    // Remove the specified doctor from the database
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
    

public function show($id)
{
    $doctor = Doctor::findOrFail($id);

    return view('doctors.view', compact('doctor'));
}


}
