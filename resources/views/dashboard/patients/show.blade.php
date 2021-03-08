@extends('dashboard.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Patient {{$patient->full_name}}</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header p-2">
                    <a class="btn btn-primary btn-md float-right" id="um" href="{{route('patients.index')}}">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0">
                                    <tbody>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Full name</strong></th>
                                        <td>{{$patient->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Passport number</strong></th>
                                        <td>{{$patient->passport_number}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Sex</strong></th>
                                        <td>{{$patient->sex}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Flight</strong></th>
                                        <td>{{$patient->flight}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Birth day</strong></th>
                                        <td>{{$patient->birth_day->format('d.m.Y H:s')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Flight day</strong></th>
                                        <td>{{$patient->flight_date->format('d.m.Y  H:s')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Date and time of sample
                                                collection</strong></th>
                                        <td>{{$patient->date_and_time_of_sample_collection->format('d.m.Y H:s')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Date and time of result
                                                report</strong></th>
                                        <td>{{$patient->date_and_time_of_result_report->format('d.m.Y H:s')}}</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
