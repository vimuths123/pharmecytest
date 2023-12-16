<?php

namespace App\Http\Controllers;

use App\Repositories\PrescriptionRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendUserNotification;
use Illuminate\Support\Facades\Mail;

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

    public function view_prescription($id)
    {
        $prescription = $this->prescriptionRepository->find($id);
        $user = $prescription->user;

        // dd($user->id);
        return view('pharmecy.viewprescription', compact('prescription'));
    }

    public function sendMail(Request $request)
    {
        $items = json_decode($request->input('items'), true);
        $total = $request->input('total');

        $prescription = json_decode($request->input('prescription'), true);
       
        $user = json_decode($request->input('user'), true);
        Mail::to($user['email'])->send(new SendUserNotification($items, $total, $prescription));
        
        return redirect()->route('pharmacy.dashboard')->with('success', 'Mail of prescription sent to user successfully.');
    }
}
