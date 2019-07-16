@extends('layouts.app')

@section('css')
    <style>
        input {
            margin: 8px;
        }

        .input {
            width: 50%;
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
            {{session('thongbao')}}
        @endif
        <form action="add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <table border="1px" width="80%">
                <tr>
                    <th>Name</th>
                    <td><input class="input" type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td><input class="input" type="date" name="birthday"></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input name="gender" value="1" checked="" type="radio">Male
                        <input name="gender" value="0" type="radio">Female
                    </td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input type="file" name="image"></td>
                </tr>
            </table>
            <br>
            <button type="submit" class="btn btn-default">Them</button>
        </form>
    </div>
@endsection
