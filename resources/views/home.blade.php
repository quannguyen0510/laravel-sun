@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $ply)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$ply->id}}</td>
                                    <td>{{$ply->name}}</td>
                                    <td>{{$ply->birthday}}</td>
                                    <td>@if($ply->gender == 1)
                                            {{"Male"}}
                                        @else
                                            {{"Female"}}
                                        @endif</td>
                                    <td><img src="upload/player/{{$ply->image}}" alt="" width="200px"></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                                href="players/delete/{{$ply->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                                href="players/edit/{{$ply->id}}"> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <a class="btn btn-primary" href="players/add">Create new record</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
