 @extends('layouts.master')

 @section('content') 
 <h3>Hotel Search Results</h3>
 <?php if (count($results)==0) {print ("No results were returned."); }else{ ?>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>StartingPrice</th>
      <th style="text-align: center;">Book</th>
      <th style="text-align: center;">Hotel</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($results as $result) { ?>
    <tr>
      <td>{{$result['HotelName']}}</td>
      <td>{{$result['Address']}}</td>
      <td>{{$result['StartingPrice']}}</td>
      <td style="text-align: center;"><a href="{{ route('hotel.book', $result['Address']) }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
      <td style="text-align: center;"><a href="{{ route('hotel.details', $result['Address']) }}"><button class="btn btn-info btn-xs" type="button">Details</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table> 
<?php } ?>
@stop