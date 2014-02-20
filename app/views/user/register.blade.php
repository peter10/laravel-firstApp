@extends('layout')

@section('content')

<h2>Register</h2>

{{ Form::open(array('route' => 'user.create')) }}
<ul>

    <li>
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name') }}
    </li>

    <li>
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email') }}
    </li>

    <li>
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password') }}
    </li>

    <li>
        {{ Form::label('colours', 'Favourite Colours:') }}
        <ul>
            @foreach($colours as $colour)
            <li>
                {{ Form::checkbox('colours[]', $colour->id, false, array('id' => 'colours_' . $colour->name)) }}
                {{ Form::label('colours_' . $colour->name, $colour->name) }}
                <span style="background-color: #{{{ $colour->hex_code }}}" class="colourSwatch"></span>
            </li>
            @endforeach
        </ul>
    </li>

    <li>
        {{ FirstApp\Captcha\Helper::input(); }}
    </li>


    <li>
        {{ Form::submit('Submit', array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop