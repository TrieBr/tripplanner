 @extends('layouts.master')

 @section('content') 
 <h3>Package Booked Sucessfully!</h3>
  <form class="form-horizontal">
  <fieldset>
    <legend>Flight Details</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Seat Number: </label>
      <div class="col-lg-10">
        {{$bookinfo['flightseat']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Class </label>
      <div class="col-lg-10">
        {{$bookinfo['flightclass']}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Price</label>
      <div class="col-lg-10">
        ${{number_format($bookinfo['flightprice'])}}
      </div>
    </div>   
  </fieldset>
</form>
 <form class="form-horizontal">
  <fieldset>
    <legend>Hotel Details</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Check-in Date:</label>
      <div class="col-lg-10">
        {{$bookinfo['hotelCheckIn']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Price Per Night</label>
      <div class="col-lg-10">
        ${{number_format($bookinfo['hotelPrice'])}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Room No.</label>
      <div class="col-lg-10">
        {{$bookinfo['hotelroom']}}
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 ">Length of Stay</label>
      <div class="col-lg-10">
        {{$bookinfo['nights']}} Nights
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 "></label>
      <div class="col-lg-10">
      </div>
    </div>
    
  </fieldset>
</form>
@stop