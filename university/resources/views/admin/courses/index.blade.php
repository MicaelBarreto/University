@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/courses/new" class="float-right btn btn-success">{{ _('New Course') }}</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Menu</th>
                            <th>Student Amount</th>
                            <th>Options</th>
                        </tr>
                        @foreach($courses as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->menu}}</td>
                                <td>{{ $p->students_amount }}</td>
                                <td>
                                    <a href="/courses/{{ $p->id }}/edit" class="btn btn-warning">Edit</a>
                                    <a href="/courses/{{ $p->id }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
