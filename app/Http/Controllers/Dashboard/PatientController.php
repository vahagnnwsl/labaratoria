<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PatientExport;
use App\Http\Controllers\Controller;

use App\Http\Repositories\PatientRepository;
use App\Http\Requests\PatientRequest;
use Maatwebsite\Excel\Facades\Excel;
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


    public function index()
    {

        $patients = $this->patientRepository->getAll();

        return view('dashboard.patients.index', compact('patients'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('dashboard.patients.create');
    }


    /**
     * @param PatientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(PatientRequest $request)
    {

        $this->patientRepository->store($request->validated());


        session()->flash('success', 'Successfully created');


//       PDF::loadHTML(view('pdf.patient', compact('model')))->setPaper('a4', 'portrait')->setWarnings(false);

        return redirect()->route('patients.index');

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $patient = $this->patientRepository->getById($id);

        if (!$patient) {
            abort(404);
        }

        return view('dashboard.patients.show', compact('patient'));

    }


    /**
     * @param $id
     * @return mixed
     */
    public function downloadPdf($id)
    {
        $model = $this->patientRepository->getById($id);
        if (!$model) {
            abort(404);
        }

        $this->patientRepository->updateStatus($id);
        $pdf = PDF::loadHTML(view('pdf.patient', compact('model')))->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download($model->passport_number . '.pdf');
    }


    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new PatientExport(), date('d-m-Y').'-patients.xlsx');
    }

}
