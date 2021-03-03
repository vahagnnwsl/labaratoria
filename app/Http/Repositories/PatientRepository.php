<?php

namespace App\Http\Repositories;


use App\Models\Patient;

class PatientRepository
{
    /**
     * @param array $requestData
     * @return mixed
     */
    public function store(array $requestData)
    {
       return  Patient::create($requestData);
    }


    /**
     * @param string $hash
     * @return mixed
     */
    public function getByHash(string $hash)
    {

        return Patient::whereHash($hash)->first();
    }
}
