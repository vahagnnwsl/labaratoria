<?php

namespace App\Http\App2\Repositories;


use App\Models\Patient;
use App\Models\Patient2;
use App\Http\Repository;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PatientRepository extends Repository
{

    /**
     * @param Patient2 $patient
     */
    public function __construct(Patient2 $patient)
    {
        parent::__construct($patient);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model::orderByDesc('created_at')->paginate(20);
    }

    /**
     * @param $requestData
     * @return mixed
     */
    public function store($requestData)
    {

        $requestData['hash'] = md5(json_encode($requestData) . time());
        $model = $this->model::create($requestData);
        QrCode::generate(route('app2.patient.show', $model->hash), storage_path('app/public/' . $this->model::QR_CODE_PATH . $model->hash . '.svg'));

        return $model;
    }


    /**
     * @param string $hash
     * @return mixed
     */
    public function getByHash(string $hash)
    {
        return $this->model->whereHash($hash)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model::whereId($id)->first();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function updateStatus(int $id)
    {
        return $this->model->whereId($id)->update(['status' => 1]);
    }

    /**
     * @param array $request
     * @param int $id
     * @return mixed
     */
    public function update(array $request, int $id)
    {

        return $this->model->whereId($id)->update($request);
    }
}
