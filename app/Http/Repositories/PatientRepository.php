<?php

namespace App\Http\Repositories;


use App\Models\Patient;

class PatientRepository
{


    /**
     * @return mixed
     */
    public function getAll()
    {
        return Patient::orderByDesc('created_at')->paginate(20);
    }


    /**
     * @param array $requestData
     */
    public function store(array $requestData): void
    {
        Patient::create($requestData);
    }


    /**
     * @param string $hash
     * @return mixed
     */
    public function getByHash(string $hash)
    {
        return Patient::whereHash($hash)->first();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {

        return Patient::whereId($id)->first();
    }

    /**
     * @param int $id
     */
    public function updateStatus(int $id): void
    {
        $model = $this->getById($id);
        if ($model) {
            $model->update(['status' => 1]);
        }

    }

    /**
     * @param $id
     */
    public function destroy($id): void
    {
        $model = $this->getById($id);
        if ($model) {
            $model->delete();
        }
    }

    /**
     * @param array $request
     * @param int $id
     */
    public function update(array $request, int $id): void
    {
        $model = $this->getById($id);
        if ($model) {
            $model->update($request);
        }
    }

}
