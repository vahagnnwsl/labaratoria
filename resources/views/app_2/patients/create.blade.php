@extends('app')

@push('css')
    <style>
        .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: .75rem 1.25rem;
            color: inherit;
        }
    </style>

@endpush

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center py-4 px-3">
        <div class="card py-4 px-5 border-0 w-100"
             style="max-width: 700px; box-shadow: 0 0px 40px 0 rgb(40, 167, 69, 0.2)">

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a  class="close" title="close"  onclick="location.reload()" style="cursor: pointer">×</a>
                    <span class="text-bold" style="font-size: 1.2rem">Ваш сертификат сформирован, спасибо!</span> <br>
                    {!! session()->get('success') !!}
                </div>
            @else
                <div class="card-body w-100">
                    <form method="POST" action="" id="form">
                        @csrf
                        <fieldset>
                            <div class="mb-3">
                                <label for="full_name" class="form-label">ФИО (по-русски) *</label>
                                <input type="text" id="full_name" class="form-control" name="full_name"
                                       value="{{old('full_name')}}">

                                @error('full_name')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="full_name_en" class="form-label">ФИО (по-английски ) *</label>
                                <input type="text" id="full_name_en" class="form-control" name="full_name_en"
                                       value="{{old('full_name_en')}}">

                                @error('full_name_en')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="birth_day" class="form-label">Дата рождения  *</label>
                                <input type="date" id="birth_day" class="form-control" name="birth_day"
                                       value="{{old('birth_day')}}">

                                @error('birth_day')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="sex" class="form-label">Пол *</label>
                                <select class="form-control" id="sex" name="sex">
                                    <option selected disabled>Выбирать</option>
                                    <option value="male" {{old('sex') === 'male'?'selected':''}}>Male</option>
                                    <option value="female" {{old('sex') === 'female'?'selected':''}}>Female</option>
                                </select>

                                @error('sex')
                                <span class="invalid-feedback d-block" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="citizenship" class="form-label">Гражданство  *</label>
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


                            <div class="mb-3">
                                <label for="international_doc_num" class="form-label">Номер международного
                                    Документа *</label>
                                <input type="text" id="international_doc_num" class="form-control"
                                       name="international_doc_num"
                                       value="{{old('international_doc_num')}}">

                                @error('international_doc_num')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="internal_doc_num" class="form-label">Номер внутреннего Документа *</label>
                                <input type="text" id="internal_doc_num" class="form-control" name="internal_doc_num"
                                       value="{{old('internal_doc_num')}}">

                                @error('internal_doc_num')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="date_first_component" class="form-label"> Дата введения первого компонента *</label>
                                <input type="date" id="date_first_component"
                                       class="form-control"
                                       name="date_first_component"
                                       value="{{old('date_first_component')}}">

                                @error('date_first_component')
                                <span class="invalid-feedback d-block" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                       </span>
                                @enderror

                            </div>


                            <div class="mb-3">
                                <label for="date_second_component" class="form-label"> Дата введения второго компонента *</label>
                                <input type="date" id="date_second_component"
                                       class="form-control"
                                       name="date_second_component"
                                       value="{{old('date_second_component')}}">

                                @error('date_second_component')
                                <span class="invalid-feedback d-block" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                       </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="certificate_number" class="form-label">Номер Сертификата *</label>
                                <input type="number" id="certificate_number"  class="form-control" name="certificate_number"
                                       value="{{old('certificate_number')}}">

                                @error('certificate_number')
                                <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="medical_institution" class="form-label">Мед. Учреждение  *</label>
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


                            <button type="submit" class="btn btn-success w-100">Отправить</button>
                        </fieldset>
                    </form>
                </div>
            @endif

        </div>

    </div>
@endsection
