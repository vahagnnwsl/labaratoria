<?php

namespace App\Http\App1\Controllers;

use App\Http\App1\Repositories\PatientRepository;
use App\Http\App1\Requests\PatientFrontRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use PDF;
use Carbon\Carbon;
use App\Http\Controller;


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
        return view('patients.create');
    }


    /**
     * @param PatientFrontRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientFrontRequest $request)
    {

        $data = $request->validated();
        $data['date_and_time_of_sample_collection'] = Carbon::now()->subHours(4)->toDate();
        $data['date_and_time_of_result_report'] = Carbon::now()->subHours(2)->toDate();
        $this->patientRepository->store($data);


        session()->flash('success', 'Для получения документа переведите 3000 рублей на "Сбер" по номеру +79624908515, и пришлите снимок - подтверждение платежа на этот же номер по WhatsApp.
Ответным сообщением вы получите сертификат с QR кодом, который активен для проверки 72 часа.
При прохождении проверок показывайте сертификат на телефоне или можете распечатать.');

        return redirect()->back();
    }

    /**
     * @param string $hash
     * @return Application|Factory|View
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
