 @extends('layouts.masterprovider')

 @section('content') 
 <h3>Hotels <a href="{{ route('provider.hotel.add') }}"><button type="button" class="btn btn-info">Add Hotel</button></a></h3> 
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th style="text-align: center;">Update</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($hotels as $hotel) { ?>
    <tr>
      <td>{{$hotel['HotelName']}}</td>
      <td>{{$hotel['Address']}}</td>
      <td style="text-align: center;"><a href="{{ route('provider.hotel.update', $hotel['Address']) }}"><button class="btn btn-primary btn-xs" type="button">Update</button></a></td>
    </tr>
     <?php } ?>
   
  </tbody>
</table> 
@stop