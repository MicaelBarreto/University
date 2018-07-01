@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Course Edit                  
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/course/update') }}" aria-label="{{ __('edit') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $course->name }}" required autofocus>  
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-md-4 col-form-label text-md-right">{{ __('Menu') }}</label>
                            <div class="col-md-6">
                                <input id="menu" type="text" class="form-control{{ $errors->has('mene') ? ' is-invalid' : '' }}" name="menu" value="{{ $course->menu }}" required autofocus>  
                                @if ($errors->has('menu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('menu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_amount" class="col-md-4 col-form-label text-md-right">{{ __('Student Amount') }}</label>
                            <div class="col-md-6">
                                <input id="student_amount" type="number" class="form-control{{ $errors->has('student_amount') ? ' is-invalid' : '' }}" name="student_amount" value="{{ $course->students_amount }}" required autofocus>  
                                @if ($errors->has('student_amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $course->id }}">  
                         <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection