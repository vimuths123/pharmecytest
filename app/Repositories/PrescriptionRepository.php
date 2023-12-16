<?php

namespace App\Repositories;

use App\Models\Prescription;
use Illuminate\Pagination\LengthAwarePaginator;

class PrescriptionRepository implements PrescriptionRepositoryInterface
{
    public function create(array $data)
    {
        return Prescription::create($data);
    }

    public function all(int $perPage = 10)
    {
        // Fetch prescriptions with published_date not null
        $prescriptions = Prescription::latest('updated_at')
            ->paginate($perPage);

        // Transform the result to a LengthAwarePaginator instance
        return new LengthAwarePaginator(
            $prescriptions->items(),
            $prescriptions->total(),
            $prescriptions->perPage(),
            $prescriptions->currentPage(),
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    public function find($id)
    {
        return Prescription::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $blog = Prescription::findOrFail($id);
        $blog->update($data);

        return $blog;
    }
}