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
        <div class="card py-4 px-5 border-0 w-100" style="max-width: 700px; box-shadow: 0 0px 40px 0 rgb(40, 167, 69, 0.2)">
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible">
                  <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                   {{session()->get('success')}}
              </div>
            @endif
                <div class="card-body w-100">
                   <form method="POST" action="{{route('patient.store')}}" id="form">
                @csrf
                <fieldset>
                    <div class="mb-3">
                        <label for="full_name" class="form-label">ФИО *</label>
                        <input type="text" id="full_name" class="form-control" name="full_name"
                               value="{{old('full_name')}}">

                        @error('full_name')
                        <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="whats_app" class="form-label">Whats app *</label>
                        <input type="text" id="whats_app" class="form-control" name="whats_app"
                               value="{{old('whats_app')}}">

                        @error('whats_app')
                        <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="birth_day" class="form-label">Дата рождения *</label>
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
                            <option>Choose</option>
                            <option value="male" {{old('sex') === 'male'?'selected':''}}>Male</option>
                            <option value="female"  {{old('sex') === 'female'?'selected':''}}>Female</option>
                        </select>

                        @error('sex')
                        <span class="invalid-feedback d-block" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="passport_number" class="form-label">Паспорт *</label>
                        <input type="text" id="passport_number" class="form-control" name="passport_number" value="{{old('passport_number')}}">

                        @error('passport_number')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="flight" class="form-label">Рейс</label>
                        <input type="text" id="flight" class="form-control" name="flight" value="{{old('flight')}}">

                        @error('flight')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="flight_date" class="form-label">Дата рейса</label>
                        <input type="datetime-local" id="flight_date" class="form-control"
                               name="flight_date" value="{{old('flight_date')}}">

                        @error('flight_date')
                        <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="date_and_time_of_sample_collection" class="form-label">Дата и время взятия пробы *</label>
                        <input type="datetime-local" id="date_and_time_of_sample_collection" class="form-control"
                               name="date_and_time_of_sample_collection" value="{{old('date_and_time_of_sample_collection')}}">

                        @error('date_and_time_of_sample_collection')
                        <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="date_and_time_of_result_report" class="form-label">Дата и время получения результата *</label>
                        <input type="datetime-local" id="date_and_time_of_result_report" class="form-control"
                               name="date_and_time_of_result_report" value="{{old('date_and_time_of_result_report')}}">

                        @error('date_and_time_of_result_report')
                        <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </fieldset>
            </form>
                </div>
        </div>

    </div>
@endsection
