@extends('layout')

@section('content')

<h2>Log In</h2>

{{ Form::open(array('route' => 'user.login')) }}
    <ul>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
<ul class="error">
    {{ implode('', $errors->all('<li>:message</li>')) }}
</ul>
@endif

@stop