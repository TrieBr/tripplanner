 @extends('layouts.master')

 @section('content') 
 <h3>Order History</h3>
 <h4>Flight Tickets</h4><hr/>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Flight No.</th>
      <th>Destination</th>
      <th>DepartDate</th>
      <th>Seat Number</th>
      <th>Class</th>
      <th>Price</th>
      <th style="text-align: center;">Review</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach($flightresults as $result) { ?>
      <td>{{$result['FlightNo']}}</td>
      <td>{{$result['ArrivingAt']}}</td>
      <td>{{$result['DepartTime']}}</td>
      <td>{{$result['SeatNum']}}</td>
      <td>{{$result['Class']}}</td>
      <td>${{number_format($result['Price'],2)}}</td>
      <td style="text-align: center;"><a href="{{ route('flight.review', $result['FlightNo']) }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
     <?php } ?>
  </tbody>
</table> 

<h4>Hotel Reservations</h4><hr/>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Check-In Date</th>
      <th>Check out Date</th>
      <th style="text-align: center;">Review</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($hotelresults as $result) { ?>
    <tr>
      <td>{{$result['HotelName']}}</td>
      <td>{{$result['BasedIn']}}</td>
      <td>{{$result['CheckInDate']}}</td>
      <td>{{$result['CheckOutDate']}}</td>
      <td style="text-align: center;"><a href="{{ route('hotel.review', $result['Address']) }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
@stop