<?php

// app/Http/Resources/AppointmentResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
            'appointment_date' => $this->appointment_date,
            'notes' => $this->notes,
            // Add more fields as needed
        ];
    }
}
