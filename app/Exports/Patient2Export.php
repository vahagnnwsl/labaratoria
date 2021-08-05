<?php

namespace App\Exports;

use App\Models\Patient2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Patient2Export implements FromCollection, WithMapping, WithHeadings

{
    public function headings(): array
    {
        return [
            'Hash',
            'ФИО (по-английски )',
            'ФИО (по-русски )',
            'Номер международного Документа',
            'Номер внутреннего Документа',
            'Гражданство',
            'Дата введения первого компонента',
            'Дата введения второго компонента',
            'Мед. Учреждение',
            'Номер Сертификата',
            'Дата рождения',
            'Created'
        ];
    }

    public function collection()
    {
        return Patient2::all();
    }


    /**
     * @param mixed $patient
     * @return array
     */
    public function map($patient): array
    {


        return [
            $patient->hash,
            $patient->full_name,
            $patient->full_name_en,
            $patient->international_doc_num,
            $patient->internal_doc_num,
            config('country')[$patient->citizenship],
            $patient->date_first_component->format('d-m-Y'),
            $patient->date_second_component->format('d-m-Y'),
            config('medical_institution')[$patient->medical_institution]['ru'],
            $patient->certificate_number,
            $patient->birth_day->format('d-m-Y'),
            $patient->created_at->format('d-m-Y'),
        ];
    }
}
