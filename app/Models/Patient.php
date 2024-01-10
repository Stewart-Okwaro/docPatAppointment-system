<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Define the fillable attributes
    // protected $fillable = ['name', 'age', 'gender', 'contact_number'];
    // Patient.php

    protected $fillable = [
        'name', 'dob', 'phone', 'medical_history', 'patient_case',
        // ... other existing fields
    ];


    // Other model properties and methods...
}
