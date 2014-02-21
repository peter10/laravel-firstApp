@extends('layout')

@section('content')
<h2>Colours</h2>

<table id="users">
    <tr><th>name</th><th>hex code</th><th></th><th></th></tr>
    @foreach( $colours as $colour ) 
    <tr>
        <td>{{{ $colour->name }}}</td>
        <td>{{{ $colour->hex_code }}}</td>
        <td><div style="background-color: #{{{ $colour->hex_code }}}" class="colourSwatch"></div></td>
        <td>@if(Auth::check()) {{ link_to_route('colour.delete', 'Delete', array('id' => $colour->id)) }} @endif</td>
    </tr>
    @endforeach
</table>

@if(Auth::check())
{{ Form::open(array('route' => 'colour.create')) }}
<h2>Add a colour</h2>
<ul>

    <li>
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', Input::old('name')) }}
    </li>

    <li>
        {{ Form::label('hex_code', 'Hex Code:') }}
        {{ Form::text('hex_code') }}
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

@else
<p>Registered users can add and delete colours.<p>
@endif

@stop
