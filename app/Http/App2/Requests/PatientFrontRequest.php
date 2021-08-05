<?php

namespace App\Http\App2\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientFrontRequest extends FormRequest
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


        return [
            'full_name' => 'required|string|max:255',
            'full_name_en' => 'required|string|max:255',
            'international_doc_num' => 'required|string|max:255',
            'internal_doc_num' => 'required|string|max:255',
            'certificate_number' => 'required|string|max:8|min:8',
            'sex' => 'required||in:male,female',
            'citizenship' => 'required||in:'.implode(',',array_keys(config('country'))),
            'medical_institution' => 'required||in:'.implode(',',array_keys(config('medical_institution'))),
            'birth_day' => 'required|date_format:Y-m-d',
            'date_first_component' => 'required|date_format:Y-m-d',
            'date_second_component' => 'required|date_format:Y-m-d',
        ];
    }
}
