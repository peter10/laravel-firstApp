@extends('layout')

@section('content')
    <h2>Users</h2>
    <table id="users">
        <tr><th>id</th><th>name</th><th>email</th><th>favourite colours</th></tr>
    @foreach($users as $user) 
        <tr>
            <td>{{{ $user->id }}}</td>
            <td>{{{ $user->name }}}</td>
            <td>{{{ $user->email }}}</td>
            <td>{{ View::make('user.colourList', array('colours' => $user->colours)) }}</td>
        </tr>
    @endforeach
    </table>

@stop