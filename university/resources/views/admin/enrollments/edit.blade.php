@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('/admin/enrollments/update') }}" aria-label="{{ __('edit') }}"> 
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Student Name') }}</label>
                            <div class="col-sm-5">
                                <select name="id_student">';
                                    <option value="{{$row[0]->id_student}}">{{$row[0]->student_name}}</option>
                                     @foreach($students as $p)
                                    <option value="{{$p->id}}"> {{$p->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Course') }}</label>
                            <div class="col-sm-5">
                                <select name="id_course">';
                                    <option value="{{$row[0]->id_course}}"> {{$row[0]->course_name}} </option>
                                    @foreach($courses as $p)
                                    <option value="{{$p->id}}"> {{$p->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $row[0]->id }}">  
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
