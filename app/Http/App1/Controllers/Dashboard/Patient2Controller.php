<?php

namespace App\Http\App1\Controllers\Dashboard;

use App\Exports\Patient2Export;
use App\Http\Controller;

use App\Http\App2\Repositories\PatientRepository;
use App\Http\App2\Requests\PatientFrontRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Patient2Controller extends Controller
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


    public function index()
    {

        $patients = $this->patientRepository->getAll();
        $countries = config('country');
        $clinics = config('medical_institution');
        return view('dashboard.patients2.index', compact('patients','clinics','countries'));
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $countries = config('country');
        $clinics = config('medical_institution');
        return view('dashboard.patients2.create',compact('clinics','countries'));
    }


    /**
     * @param PatientFrontRequest $request
     * @return RedirectResponse
     *
     */
    public function store(PatientFrontRequest $request)
    {

        $this->patientRepository->store($request->validated());

        session()->flash('success', 'Successfully created');


        return redirect()->route('patients2.index');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $patient = $this->patientRepository->getById($id);

        if (!$patient) {
            abort(404);
        }
        $this->patientRepository->updateStatus($id);
        $countries = config('country');
        $clinics = config('medical_institution');

        return view('dashboard.patients2.show', compact('patient','clinics','countries'));

    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $patient = $this->patientRepository->getById($id);

        if (!$patient) {
            abort(404);
        }
        $this->patientRepository->updateStatus($id);
        $countries = config('country');
        $clinics = config('medical_institution');

        return view('dashboard.patients2.edit', compact('patient','clinics','countries'));
    }


    /**
     * @param PatientFrontRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PatientFrontRequest $request, $id)
    {

        $this->patientRepository->update($request->validated(), $id);

        session()->flash('success', 'Successfully updated');

        return redirect()->back();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function downloadPdf($id)
    {
        $patient = $this->patientRepository->getById($id);
        if (!$patient) {
            abort(404);
        }
        $clinics = config('medical_institution');
        $countries = config('country');
        $domains = config('domain');
        $this->patientRepository->updateStatus($id);
        $pdf = PDF::loadHTML(view('pdf.patient2', compact('patient','clinics','domains','countries')));
        $this->patientRepository->updateStatus($id);

        return $pdf->download($patient->hash . '.pdf');
    }


    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new Patient2Export(), date('d-m-Y') . '-patients.xlsx');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {

        $this->patientRepository->destroy($id);
        session()->flash('success', 'Successfully deleted');

        return redirect()->route('patients2.index');
    }


}
