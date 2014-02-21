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
        <ul class="colours">
            @foreach($colours as $colour)
            <li>
                {{ Form::checkbox('colours[]', $colour->id, false, array('id' => 'colours-' . $colour->name)) }}
                {{ Form::label('colours-' . $colour->name, $colour->name) }}
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
<ul class="error">
    {{ implode('', $errors->all('<li>:message</li>')) }}
</ul>
@endif

@stop