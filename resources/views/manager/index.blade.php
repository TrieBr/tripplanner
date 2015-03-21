 @extends('layouts.mastermanager')

 @section('content') 
  <div class="jumbotron">
        <h1>Welcome, Manager!</h1>
        <p class="lead">Click the button below to get started</p>
        <p><a class="btn btn-lg btn-primary" href="{{ route('manager.package.add') }}" role="button">Add Package</a></p>

      </div>
@stop