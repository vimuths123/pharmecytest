<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Prescription;

class PrescriptionPolicy
{
    public function update(User $user, Prescription $prescription)
    {
        return $user->id === $prescription->user_id;
    }
}


