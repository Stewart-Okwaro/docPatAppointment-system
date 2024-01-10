<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['name', 'specialization'];
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'id');
    }

    // Other model properties and methods...
}
