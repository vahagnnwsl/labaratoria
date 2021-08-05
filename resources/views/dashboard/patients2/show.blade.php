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
                    <a class="btn btn-primary btn-md float-right" id="um" href="{{route('patients2.index')}}">
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
                                        <th class="pl-0 w-25" scope="row"><strong>Hsh</strong></th>
                                        <td>{{$patient->hash}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>ФИО (по-русски)</strong></th>
                                        <td>{{$patient->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>ФИО (по-английски )</strong></th>
                                        <td>{{$patient->full_name_en}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Дата рождения</strong></th>
                                        <td>{{$patient->birth_day}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Номер международного Документа</strong></th>
                                        <td>{{$patient->international_doc_num}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Номер внутреннего Документа</strong></th>
                                        <td>{{$patient->internal_doc_num}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Пол </strong></th>
                                        <td>{{$patient->sex}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Номер Сертификата </strong></th>
                                        <td>{{$patient->certificate_number}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Мед. Учреждение</strong></th>
                                        <td>{{$clinics[$patient->medical_institution]['ru']}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Гражданство</strong></th>
                                        <td>{{$countries[$patient->citizenship]}}</td>
                                    </tr>

                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Дата введения первого компонента
                                                collection</strong></th>
                                        <td>{{$patient->date_first_component->format('d.m.Y H:i')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 w-25" scope="row"><strong>Дата введения второго компонента
                                                report</strong></th>
                                        <td>{{$patient->date_second_component->format('d.m.Y H:i')}}</td>
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
