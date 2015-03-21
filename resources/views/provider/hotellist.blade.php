 @extends('layouts.masterprovider')

 @section('content') 
 <h3>Hotels <a href="{{ route('provider.hotel.add') }}"><button type="button" class="btn btn-info">Add Hotel</button></a></h3> 
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Capacity</th>
      <th>Location</th>
      <th style="text-align: center;">Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.hotel.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.hotel.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.hotel.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
  </tbody>
</table> 
@stop