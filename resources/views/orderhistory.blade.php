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
      <th style="text-align: center;">Review</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
  </tbody>
</table> 

<h4>Hotel Reservations</h4><hr/>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Check-In Date</th>
      <th>Length of Stay</th>
      <th style="text-align: center;">Review</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.review') }}"><button class="btn btn-success btn-xs" type="button">Leave Review</button></a></td>
    </tr>
  </tbody>
</table>
@stop