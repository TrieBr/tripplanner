 @extends('layouts.master')

 @section('content') 
 <h3>Hotel Search Results</h3>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Capacity</th>
      <th>Location</th>
      <th style="text-align: center;">Book</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('hotel.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
  </tbody>
</table> 
@stop