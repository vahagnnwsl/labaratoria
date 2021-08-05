@extends('dashboard.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create patient</h1>
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

                    <form method="POST" action="{{route('patients2.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General</h3>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <div class="form-group">
                                            <label for="full_name">ФИО (по-русски) *</label>
                                            <input type="text" id="full_name" class="form-control" name="full_name"
                                                   value="{{old('full_name')}}">
                                            @error('full_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="full_name_en">ФИО (по-английски ) *</label>
                                            <input type="text" id="full_name_en" class="form-control" name="full_name_en"
                                                   value="{{old('full_name_en')}}">
                                            @error('full_name_en')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label for="sex">Пол * </label>
                                            <select class="form-control" id="sex" name="sex">
                                                <option disabled selected>Select one</option>
                                                <option value="male" {{old('sex') === 'male'?'selected':''}}>Male</option>
                                                <option value="female"  {{old('sex') === 'female'?'selected':''}}>Female</option>
                                            </select>

                                            @error('sex')
                                            <span class="invalid-feedback d-block" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="international_doc_num">Номер международного Документа *</label>
                                            <input type="text" id="international_doc_num" class="form-control" name="international_doc_num"
                                                   value="{{old('international_doc_num')}}">
                                            @error('international_doc_num')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="internal_doc_num">Номер внутреннего Документа *</label>
                                            <input type="text" id="internal_doc_num" class="form-control" name="internal_doc_num"
                                                   value="{{old('internal_doc_num')}}">
                                            @error('internal_doc_num')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label for="citizenship">Гражданство </label>
                                            <select class="form-control" id="citizenship" name="citizenship">
                                                <option selected disabled>Выбирать</option>

                                                @foreach($countries as $iso3 => $name)
                                                    <option value="{{$iso3}}" {{old('citizenship') === $iso3?'selected':''}}>{{$name}}</option>
                                                @endforeach
                                            </select>


                                            @error('citizenship')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="medical_institution">Мед. Учреждение * </label>
                                            <select class="form-control" id="medical_institution" name="medical_institution">
                                                <option selected disabled>Выбирать</option>

                                                @foreach($clinics as $key => $name)
                                                    <option value="{{$key}}" {{old('medical_institution') === $key?'selected':''}}>{{$name['ru']}}</option>
                                                @endforeach
                                            </select>


                                            @error('medical_institution')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="birth_day">Дата рождения * </label>
                                            <input type="date" id="birth_day" class="form-control" name="birth_day"  value="{{old('birth_day')}}">

                                            @error('birth_day')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="date_first_component">Дата введения первого компонента * </label>
                                            <input type="date" id="date_first_component" class="form-control" name="date_first_component"  value="{{old('date_first_component')}}">

                                            @error('date_first_component')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="date_second_component">Дата введения второго компонента * </label>
                                            <input type="date" id="date_second_component" class="form-control" name="date_second_component"  value="{{old('date_second_component')}}">

                                            @error('date_second_component')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="certificate_number">Номер Сертификата *</label>
                                            <input type="text" id="certificate_number" class="form-control" name="certificate_number"
                                                   value="{{old('certificate_number')}}">
                                            @error('certificate_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="fa fa-check-circle"></i> Отправить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

