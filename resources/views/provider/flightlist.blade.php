 @extends('layouts.masterprovider')

 @section('content') 
 <h3>Flights <a href="{{ route('provider.flight.add') }}"><button type="button" class="btn btn-info">Add Flight</button></a></h3>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Flightno.</th>
      <th>Departing From</th>
      <th >Arriving at</th>
      <th style="text-align: center;">Update</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($flights as $flight) { ?>
    <tr>
      <td>{{$flight['FlightNo']}}</td>
      <td>{{$flight['DepartingFrom']}}</td>
      <td>{{$flight['ArrivingAt']}}</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update', $flight['FlightNo']) }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
   
   <?php } ?>
  </tbody>
</table> 
@stop