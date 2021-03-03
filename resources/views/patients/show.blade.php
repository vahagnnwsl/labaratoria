@extends('app')

@push('css')

@endpush

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center py-4 px-3">
        <h2 class="mb-4 p-0">Verify your COVID-19 certificate</h2>
        <div class="card py-4 px-5 border-0" style="max-width: 700px; box-shadow: 0 0px 40px 0 rgb(40, 167, 69, 0.2)">
            <div class="card-body">

                <div class="d-flex flex-column">
                    <div class="card_els d-flex flex-column border-bottom border-secondary py-3">
                        <h4 class="mb-2 p-0 text-secondary font-weight-light">Date of sample collection</h4>
                        <p>{{$patient->date_and_time_of_sample_collection->format('d.m.Y')}}</p>
                    </div>
                    <div class="card_els d-flex flex-column border-bottom border-secondary py-3">
                        <h4 class="mb-2 p-0 text-secondary font-weight-light">Patient</h4>
                        <p>{!! $patient->hideFullName !!}</p>
                    </div>
                    <div class="card_els d-flex flex-column border-bottom border-secondary py-3">
                        <h4 class="mb-2 p-0 text-secondary font-weight-light">Year of birth</h4>
                        <p>{{$patient->birth_day->format('d.m.Y')}}</p>
                    </div>
                    <div class="card_els d-flex flex-column pt-3">
                        <h4 class="mb-2 p-0 text-secondary font-weight-light">Verification of the SARS-CoV-2 (COVID-19)</h4>
                        <p class="text-secondary font-weight-light">test certificate</p>
                        <p class="font-weight-bold" style="font-weight: bold">Result: negative</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="/" class="card_els d-flex flex-column p-3" style="font-size: 27px;">Back to website euromed-lab.com</a>
    </div>

@endsection
