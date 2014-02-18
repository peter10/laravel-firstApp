<ul class="colourList">
    @foreach( $colours as $c )
    <li>{{{ $c->name }}}</li>
    @endforeach
</ul>