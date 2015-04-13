 @extends('layouts.masterprovider')

 @section('content') 
  <div class="jumbotron">
        <h1>Welcome, Provider!</h1>
        <p class="lead">Click the button to get started</p>
        @if (Session::get('provider.type')=="Flight")
        <p><a class="btn btn-lg btn-primary" href="{{ route('provider.flight.list') }}" role="button">Flights</a></p>
        @endif
        @if (Session::get('provider.type')=="Hotel")
        <p><a class="btn btn-lg btn-primary" href="{{ route('provider.hotel.list') }}" role="button">Hotels</a></p>
        @endif

      </div>
@stop