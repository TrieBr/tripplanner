 @extends('layouts.masterprovider')

 @section('content') 
 <h3>Flights <a href="{{ route('provider.flight.add') }}"><button type="button" class="btn btn-info">Add Flight</button></a></h3>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Flightno.</th>
      <th>Depart Date</th>
      <th >Remaining Seats</th>
      <th style="text-align: center;">Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td style="text-align: center;"><a href="{{ route('provider.flight.update') }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
  </tbody>
</table> 
@stop