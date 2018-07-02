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

                    @if (session('denied'))
                        <div class="alert alert-danger">
                            {{ session('denied') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($user as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email}}</td>
                                <td>
                                    @if(!($p->admin))
                                        <a href="/user/{{ $p->id }}/permission" class="btn btn-primary">Give Permissions</a>
                                    @else
                                        Admin
                                    @endif
                                </td>
                                <td>
                                    <a href="/user/{{ $p->id }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$user->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
