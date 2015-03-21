 @extends('layouts.master')

 @section('content') 
 <h3>Flight Search Results</h3>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Flightno.</th>
      <th>Depart Date</th>
      <th >Remaining Seats</th>
      <th style="text-align: center;">Book</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('flight.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
  </tbody>
</table> 
@stop