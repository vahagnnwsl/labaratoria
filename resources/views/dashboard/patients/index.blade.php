@extends('dashboard.app')
@push('css')
    <style>
        .new {
            background-color: #c1dec1 !important;
        }
    </style>

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Patient</h1>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header p-2">
                    <a class="btn btn-success btn-sm float-right" href="{{route('patients.create')}}">
                        <i class="fas fa-plus-circle"></i>
                        Add
                    </a>

                    <a class="btn btn-primary btn-sm float-right mr-1" href="{{route('patients.export')}}">
                        <i class="fas fa-file-download"></i>
                        Export Excel
                    </a>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped projects p-2 ">
                            <thead>
                            <tr>

                                <th style="width: 5%">
                                    #
                                </th>
                                <th style="width: 10%">
                                    Name
                                </th>
{{--                                <th style="width: 10%">--}}
{{--                                    Whats app--}}
{{--                                </th>--}}
                                <th style="width: 5%">
                                    Sex
                                </th>
                                <th style="width: 7%">
                                    Birth day
                                </th>
                                <th style="width: 10%">
                                    Passport number
                                </th>
                                <th style="width: 5%">
                                    Flight
                                </th>
                                <th style="width: 9%">
                                    Flight date
                                </th>
                                <th style="width: 9%">
                                    Date and time of sample collection
                                </th>
                                <th style="width: 9%">
                                    Date and time of result report
                                </th>
                                <th style="width: 5%">
                                    Created
                                </th>
                                <th style="width: 5%">
                                    Type
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr class="{{!$patient->status ? 'new': '' }}">
                                    <td style="font-size: 1rem">
                                        #
                                    </td>
                                    <td>
                                        {{$patient->full_name}}
                                    </td>
{{--                                    <td>--}}
{{--                                        {{$patient->whats_app}}--}}
{{--                                    </td>--}}
                                    <td>
                                        {{$patient->sex}}
                                    </td>
                                    <td>
                                        {{$patient->birth_day->format('M d , Y')}}
                                    </td>
                                    <td>
                                        {{$patient->passport_number}}
                                    </td>
                                    <td>
                                        {{$patient->flight}}
                                    </td>
                                    <td>
                                        {{$patient->flight_date ? $patient->flight_date->format('M d , Y') : ''}}
                                    </td>
                                    <td>
                                        {{$patient->date_and_time_of_sample_collection->format('M d , Y H:i')}}
                                    </td>
                                    <td>
                                        {{$patient->date_and_time_of_result_report->format('M d , Y H:i')}}
                                    </td>
                                    <td>
                                        {{$patient->created_at->format('M d Y')}}
                                    </td>
                                    <td>
                                        {{!$patient->type?'User':'Admin'}}
                                    </td>
                                    <td class=" project-actions text-right">
                                        <a class="btn btn-warning btn-sm" href="{{route('patients.pdf',$patient->id)}}">
                                            <i class="fa fa-file-pdf"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('patients.edit',$patient->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{route('patients.show',$patient->id)}}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <form method="POST" action="{{ route('patients.destroy',  $patient->id) }}"
                                              accept-charset="UTF-8"
                                              style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Permission"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fas fa-trash"> </i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $patients->links('vendor.pagination') !!}

                </div>
            </div>
        </div>

    </section>


@endsection
