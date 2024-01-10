<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply 'auth' middleware to all methods in this controller
    }

    public function index(Request $request)
{
    $query = Appointment::query();

    if ($request->filled('doctor_id')) {
        $query->where('doctor_id', $request->input('doctor_id'));
    }

    if ($request->filled('patient_id')) {
        $query->where('patient_id', $request->input('patient_id'));
    }

    // $appointments = $query->paginate(10);
    // $doctors = Doctor::all();
    // $patients = Patient::all();
    $perPage = $request->input('perPage', 10);

    $appointments = $perPage === 'all' ? $query->get() : $query->paginate($perPage);
    $doctors = Doctor::all();
    $patients = Patient::all();

    return view('appointments.index', compact('doctors', 'patients', 'appointments'));
}

    // Show the form for creating a new appointment
    public function create()
    {
        // You may want to pass doctors and patients to the view for selection
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('appointments.create', compact('doctors', 'patients'));
    }

    // Store a newly created appointment in the database
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment added successfully');
    }
        // Show the form for editing the specified appointment
        public function edit($id)
        {
            $appointment = Appointment::findOrFail($id);
            $doctors = Doctor::all();
            $patients = Patient::all();

           // dd($appointment->appointment_date, $appointment->appointment_time);

           
    
            return view('appointments.edit', compact('appointment', 'doctors', 'patients'));
        }
           // Update the specified appointment in the database
    public function update(Request $request, $id)
    {
        // dd('Update method reached', $request->all());

        $validatedData = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);
        
        $appointment = Appointment::findOrFail($id);
        
        $appointment->update($validatedData);


        // return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
        if ($appointment->wasChanged()) {
            // Update successful
            return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
        } else {
            // No changes, possibly an issue
            return redirect()->route('appointments.index')->with('error', 'No changes made or an issue occurred during the update');
        }
    }
        public function show($id)
        {
            $appointment = Appointment::findOrFail($id);
    
            return view('appointments.view', compact('appointment'));
        }

           // Remove the specified appointment from the database
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }

}
