<?php

namespace App\Repositories;

use App\Models\Prescription;

class PrescriptionRepository implements PrescriptionRepositoryInterface
{
    public function create(array $data)
    {
        return Prescription::create($data);
    }

}