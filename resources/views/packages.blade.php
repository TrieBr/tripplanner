 @extends('layouts.master')

 @section('content') 
 <h3>Available Packages</h3>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Date Offered</th>
      <th>Discount</th>
      <th>Location</th>
      <th style="text-align: center;">Book</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('package.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('package.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('package.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('package.book') }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
  </tbody>
</table> 
@stop