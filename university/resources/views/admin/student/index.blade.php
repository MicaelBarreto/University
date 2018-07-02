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

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Address</th>
                            <th>Cellphone</th>
                        </tr>
                        @foreach($student as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->CPF }}</td>
                                <td>{{ $p->RG }}</td>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->cellphone }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{$student->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
