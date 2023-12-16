<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PrescriptionRepositoryInterface;
use App\Models\Prescription;


class UserController extends Controller
{

    protected $prescriptionRepository;

    public function __construct(PrescriptionRepositoryInterface $prescriptionRepository)
    {
        $this->prescriptionRepository = $prescriptionRepository;
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function respondToPrescription(){
        return view('respond');
    }

    public function processApproval(Request $request, $id)
    {
        $approvalResult = $request->input('approval');
        $prescription = $this->prescriptionRepository->find($id);

        if ($approvalResult === 'approve') {
            $prescription = $this->prescriptionRepository->update($id, [
                'status' => Prescription::STATUS_APPROVED
            ]);

            // return 'Approved!';
        } elseif ($approvalResult === 'reject') {
            $prescription = $this->prescriptionRepository->update($id, [
                'status' => Prescription::STATUS_REJECTED
            ]);

            // return 'Rejected!';
        }

        return redirect()->route('dashboard')->with('success', 'Thanks for your responce. We will check it');
    }
}
