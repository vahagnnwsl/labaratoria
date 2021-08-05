<?php

namespace App\Http\App2\Controllers;

use App\Http\App2\Repositories\PatientRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use PDF;
use App\Http\Controller;
use App\Http\App2\Requests\PatientFrontRequest;


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
     * @return Application|Factory|View
     */
    public function create()
    {
        $countries = config('country');
        $clinics = config('medical_institution');
        return view('app_2.patients.create', compact('countries', 'clinics'));
    }


    /**
     * @param PatientFrontRequest $request
     * @return RedirectResponse
     */
    public function store(PatientFrontRequest $request): RedirectResponse
    {

        $this->patientRepository->store($request->validated());

        session()->flash('success', 'УСПЕШНО');

        return redirect()->back();
    }


    /**
     * @param string $hase
     * @return Application|Factory|View
     */
    public function show(string $hase)
    {
        $patient = $this->patientRepository->getByHash($hase);

        if (!$patient){
            abort(404);
        }

        return view('app_2.patients.show', compact('patient'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {

        $this->patientRepository->destroy($id);
        session()->flash('success', 'Successfully deleted');

        return redirect()->back();
    }

}
