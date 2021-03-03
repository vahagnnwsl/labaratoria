<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PatientRepository;
use App\Http\Requests\PatientRequest;
use PDF;


class PatientController extends Controller
{

    /**
     * @var PatientRepository
     */
    protected $patientRepository;

    /**
     * PatientController constructor.
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('patients.create');
    }


    /**
     * @param PatientRequest $request
     * @return mixed
     */
    public function store(PatientRequest $request)
    {

        $model = $this->patientRepository->store($request->validated());


        session()->flash('success', 'Successfully created' );


        $pdf =  PDF::loadHTML(view('pdf.patient', compact('model')))->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download($model->passport_number.'.pdf');

    }

    /**
     * @param string $hash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $hash)
    {
        $patient = $this->patientRepository->getByHash($hash);

        if (!$patient) {
            abort(404);
        }

        return view('patients.show', compact('patient'));

    }

}
