<?php

namespace App\Http\App1\Controllers\Dashboard;

use App\Exports\PatientExport;
use App\Http\Controller;

use App\Http\App1\Repositories\PatientRepository;
use App\Http\App1\Requests\PatientRequest;
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

        $request = $request->validated();

        $request['type'] = 1;

        $this->patientRepository->store($request);


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
        $this->patientRepository->updateStatus($id);

        return view('dashboard.patients.show', compact('patient'));

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $patient = $this->patientRepository->getById($id);

        if (!$patient) {
            abort(404);
        }
        $this->patientRepository->updateStatus($id);

        return view('dashboard.patients.edit', compact('patient'));
    }


    /**
     * @param PatientRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientRequest $request, $id)
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
        $model = $this->patientRepository->getById($id);
        if (!$model) {
            abort(404);
        }

        $this->patientRepository->updateStatus($id);
        $pdf = PDF::loadHTML(view('pdf.patient', compact('model')))->setPaper('a4', 'portrait')->setWarnings(false);
        $this->patientRepository->updateStatus($id);

        return $pdf->download($model->passport_number . '.pdf');
    }


    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new PatientExport(), date('d-m-Y') . '-patients.xlsx');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $this->patientRepository->destroy($id);
        session()->flash('success', 'Successfully deleted');

        return redirect()->route('patients.index');
    }
}
