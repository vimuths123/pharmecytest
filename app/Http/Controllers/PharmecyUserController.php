<?php

namespace App\Http\Controllers;
use App\Repositories\PrescriptionRepositoryInterface;

class PharmecyUserController extends Controller
{

    protected $prescriptionRepository;

    public function __construct(PrescriptionRepositoryInterface $prescriptionRepository)
    {
        $this->prescriptionRepository = $prescriptionRepository;
    }

    public function dashboard()
    {
        $perPage = 10;
        $prescriptions = $this->prescriptionRepository->all($perPage);
        return view('pharmecy.pharmecydashboard', compact('prescriptions'));
    }

    public function view_prescription($id){
        $prescription = $this->prescriptionRepository->find($id);
        return view('pharmecy.viewprescription', compact('prescription'));
    }
}
