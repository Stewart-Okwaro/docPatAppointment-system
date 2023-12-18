<?php

// app/Http/Controllers/Api/DoctorApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Resources\DoctorResource;

class DoctorApiController extends Controller
{
    // Display a listing of doctors
    public function index()
    {
        $doctors = Doctor::all();
        return DoctorResource::collection($doctors);
    }

    // Display the specified doctor
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return new DoctorResource($doctor);
    }

    // Add more API methods as needed
}
