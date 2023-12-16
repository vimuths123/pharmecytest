<?php

namespace App\Repositories;

interface PrescriptionRepositoryInterface
{
    public function create(array $data);
    public function all(int $perPage);
    public function find(int $id);
    public function update($id, array $data);
}
