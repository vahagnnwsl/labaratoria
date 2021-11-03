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
                    <a class="btn btn-primary btn-md float-right" id="um" href="{{route('patients.index')}}">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body p-2">

                    <form method="POST" action="{{route('patients.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General</h3>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <div class="form-group">
                                            <label for="full_name">Full name *</label>
                                            <input type="text" id="full_name" class="form-control" name="full_name"
                                                   value="{{old('full_name')}}">
                                            @error('full_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label for="whats_app">Whats app *</label>--}}
{{--                                            <input type="text" id="whats_app" class="form-control" name="whats_app"--}}
{{--                                                   value="{{old('whats_app')}}">--}}
{{--                                            @error('whats_app')--}}
{{--                                            <span class="invalid-feedback d-block" role="alert">--}}
{{--                                                 <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

                                        <div class="form-group">
                                            <label for="sex">Sex * </label>
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
                                            <label for="full_name">Passport number *</label>
                                            <input type="text" id="passport_number" class="form-control" name="passport_number"
                                                   value="{{old('passport_number')}}">
                                            @error('passport_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label for="flight">Flight </label>
                                            <input type="text" id="flight" class="form-control" name="flight"  value="{{old('flight')}}">

                                            @error('flight')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="birth_day">Birth day *</label>
                                            <input type="date" id="birth_day" class="form-control" name="birth_day"  value="{{old('birth_day')}}">

                                            @error('birth_day')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="flight_date">Flight date </label>
                                            <input type="date" id="flight_date" class="form-control" name="flight_date"  value="{{old('flight_date')}}">

                                            @error('flight_date')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="date_and_time_of_sample_collection">Date and time of sample collection *</label>
                                            <input type="datetime-local" id="date_and_time_of_sample_collection" class="form-control" name="date_and_time_of_sample_collection"  value="{{old('date_and_time_of_sample_collection')}}">

                                            @error('date_and_time_of_sample_collection')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="date_and_time_of_result_report">Date and time of result report *</label>
                                            <input type="datetime-local" id="date_and_time_of_result_report" class="form-control" name="date_and_time_of_result_report"  value="{{old('date_and_time_of_result_report')}}">

                                            @error('date_and_time_of_result_report')
                                            <span class="invalid-feedback d-block" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="fa fa-check-circle"></i> Submit
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
