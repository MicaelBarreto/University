@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Student Register                  
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/student/$student->id/update') }}" aria-label="{{ __('store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $student->name }}" required autofocus>  
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CPF" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>
                            <div class="col-md-6">
                                <input id="CPF" type="text" class="form-control{{ $errors->has('CPF') ? ' is-invalid' : '' }}" name="CPF" value="{{ $student->CPF }}" required autofocus>  
                                @if ($errors->has('CPF'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CPF') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="RG" class="col-md-4 col-form-label text-md-right">{{ __('RG') }}</label>
                            <div class="col-md-6">
                                <input id="RG" type="text" class="form-control{{ $errors->has('RG') ? ' is-invalid' : '' }}" name="RG" value="{{ $student->RG }}" required autofocus>  
                                @if ($errors->has('RG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('RG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('addres') ? ' is-invalid' : '' }}" name="address" value="{{ $student->address }}" required autofocus>  
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cellphone" class="col-md-4 col-form-label text-md-right">{{ __('Cellphone') }}</label>
                            <div class="col-md-6">
                                <input id="cellphone" type="text" class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="{{ $student->cellphone }}" required autofocus>  
                                @if ($errors->has('cellphone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection