<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientExport implements FromCollection, WithMapping, WithHeadings

{
    public function headings(): array
    {
        return [
            'Hash',
            'Full name',
            'Whats app',
            'Sex',
            'Passport number',
            'Flight',
            'Birth day',
            'Flight date',
            'Date and time of sample collection',
            'Date and time of result report',
            'Created',
        ];
    }

    public function collection()
    {
        return Patient::all();
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
            $patient->whats_app,
            $patient->sex,
            $patient->passport_number,
            $patient->flight,
            $patient->birth_day->format('d-m-Y'),
            $patient->flight_date->format('d-m-Y'),
            $patient->date_and_time_of_sample_collection->format('d-m-Y H:i'),
            $patient->date_and_time_of_result_report->format('d-m-Y H:i'),
            $patient->created_at->format('d-m-Y H:i'),
        ];
    }
}
