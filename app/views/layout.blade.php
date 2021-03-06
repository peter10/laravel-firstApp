<!doctype html>
<html>
    <head>
        <title>First Laravel App</title>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/styles.css') }}">

    </head>
    <body>

        @section('header')
        <h1>{{ link_to_route('home', 'First Laravel App') }}</h1>
        @if(Auth::check())
        <p>Hello {{{ Auth::user()->name }}}</p>
        @endif
        @show

        <ul id="nav" class="nav nav-pills">
            <li>{{ link_to_action('UserController@index', 'Users') }}</li>
            <li>{{ link_to_route('colour.index', 'Colours') }}</li>
            @if(Auth::check())
            <li>{{ link_to_route('user.logout', 'Logout') }}</li>
            <li>{{ link_to_route('user.delete', 'Delete Account') }}</li>
            @else
            <li>{{ link_to_route('user.create', 'Register') }}</li>
            <li>{{ link_to_route('user.login', 'Login') }}</li>
            @endif
        </ul>

        @yield('content')

    </body>
</html>
