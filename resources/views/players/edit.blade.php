@extends('layouts.app')

@section('css')
    <style>
        input {
            margin: 8px;
        }

        .input {
            width: 50%;
        }
        .img {
            width: 300px;
            padding: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <form action="players/edit/{{$ply->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table border="1px" width="80%">
                <tr>
                    <th>Name</th>
                    <td><input class="input" type="text" name="name" value="{{$ply->name}}"></td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td><input class="input" type="date" name="birthday" value="{{$ply->birthday}}"></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input name="gender" @if($ply->gender == 1) {{'checked'}} @endif  value="1" type="radio">Male
                        <input name="gender" @if($ply->gender == 0) {{'checked'}} @endif  value="0" type="radio">Female
                    </td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img class="img" name="image" src="upload/player/{{$ply->image}}">
                        <input type="file" name="image">
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
@endsection

