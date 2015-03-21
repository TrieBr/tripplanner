 @extends('layouts.master')

 @section('content') 
  <div class="jumbotron">
        <h1>Welcome</h1>
        <p class="lead">Trip Planner can meet all of your travel needs <i>and</i> save you time. Click a link below to get started.</p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('flight.search') }}" role="button">Flights</a></p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('hotel.search') }}" role="button">Hotels</a></p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('package.browse') }}" role="button">Packages</a></p>

      </div>
@stop