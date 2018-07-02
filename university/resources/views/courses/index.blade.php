@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Menu</th>
                            <th>Amount</th>
                        </tr>
                        @foreach($courses as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->menu }}</td>
                                <td>{{ $p->students_amount }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{$courses->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
