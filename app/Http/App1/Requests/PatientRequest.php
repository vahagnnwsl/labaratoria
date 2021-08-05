<?php

namespace App\Http\App1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->request->all());

        return [
            'full_name' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'whats_app' => 'required|string|max:255',
            'flight' => 'sometimes|string|max:255|nullable',
            'sex' => 'required||in:male,female',
            'birth_day' => 'required|date_format:Y-m-d',
            'flight_date' => 'sometimes|date_format:Y-m-d|nullable',
            'date_and_time_of_sample_collection' => 'required|date_format:Y-m-d\TH:i',
            'date_and_time_of_result_report' => 'required|date_format:Y-m-d\TH:i',
        ];
    }
}
