 @extends('layouts.master')

 @section('content') 
 <h3>Flight Search Results</h3>
 <?php if (count($results)==0) {print ("No results were returned."); }else{ ?>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Flightno.</th>
      <th>Provider</th>
      <th >Remaining Seats</th>
      <th style="text-align: center;">Book</th>
      <th style="text-align: center;">Details</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($results as $result) { ?>
    <tr>
      <td>{{$result['FlightNo']}}</td>
      <td>{{$result['ProvName']}}</td>
      <td>{{$result[2]}}</td>
      <td style="text-align: center;"><a href="{{ route('flight.book', $result['FlightNo']) }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
      <td style="text-align: center;"><a href="{{ route('flight.details', $result['FlightNo']) }}"><button class="btn btn-info btn-xs" type="button">Details</button></a></td>
    </tr>
  <?php } ?>
  
  </tbody>
</table> 
<?php } ?>

@stop