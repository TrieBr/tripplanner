 @extends('layouts.masterprovider')

 @section('content') 
  <div class="jumbotron">
        <h1>Welcome, Provider!</h1>
        <p class="lead">Click one of the buttons below to get started</p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('provider.flight.list') }}" role="button">Flights</a></p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('provider.hotel.list') }}" role="button">Hotels</a></p>

      </div>
@stop