<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Requests\PrescriptionStoreRequest;
use App\Repositories\PrescriptionRepository;

class PrescriptionController extends Controller
{

    protected $prescriptionRepository;

    public function __construct(PrescriptionRepository $prescriptionRepository)
    {
        $this->prescriptionRepository = $prescriptionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrescriptionStoreRequest $request)
    {
        $data = $request->validated();

        $images = [];

        foreach ($data['images'] as $image) {
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path =  $image->storeAs('images', $fileName, 'public');

            array_push($images, $image_path);
        }

        $data['images'] = $images;

        $data['user_id'] = auth()->user()->id;

        $this->prescriptionRepository->create($data);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
