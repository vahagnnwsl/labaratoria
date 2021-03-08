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
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close"
                       title="close">×</a>
                    {{session()->get('success')}}
                </div>
            @endif
            <div class="card-body w-100">
                <form method="POST" action="{{route('login')}}" id="form">
                    @csrf
                    <fieldset>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                   value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                   value="{{old('password')}}">

                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-success w-100">Submit  </button>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
@endsection
