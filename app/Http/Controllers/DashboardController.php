<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

class DashboardController extends Controller
{
    // Display the dashboard with appointment data
    public function index()
    {
        // Fetch data for the dashboard (example: count of appointments by date and doctor)
        $appointmentsByDate = Appointment::selectRaw('date(appointment_date) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        $appointmentsByDoctor = Doctor::withCount('appointments')->get();

        return view('dashboard.index', compact('appointmentsByDate', 'appointmentsByDoctor'));
    }

    // Display a report that filters bookings by different parameters
    public function report(Request $request)
    {
        // Fetch filtered data for the report (example: appointments by patient, doctor, and date)
        $patientName = $request->input('patient_name');
        $doctorName = $request->input('doctor_name');
        $date = $request->input('date');

        $query = Appointment::with('patient', 'doctor');

        if ($patientName) {
            $query->whereHas('patient', function ($query) use ($patientName) {
                $query->where('name', 'like', '%' . $patientName . '%');
            });
        }

        if ($doctorName) {
            $query->whereHas('doctor', function ($query) use ($doctorName) {
                $query->where('name', 'like', '%' . $doctorName . '%');
            });
        }

        if ($date) {
            $query->whereDate('appointment_date', $date);
        }

        $appointments = $query->get();

        return view('dashboard.report', compact('appointments'));
    }
}
