 @extends('layouts.master')

 @section('content') 
 <h3>Hotel Booking</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Confirmation</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Check-in Date:</label>
      <div class="col-lg-10">
        {{$checkindate}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Price Per Night</label>
      <div class="col-lg-10">
        ${{number_format($price,2)}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Room No.</label>
      <div class="col-lg-10">
        {{$roomno}}
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 ">Length of Stay</label>
      <div class="col-lg-10">
        {{$nights}} Nights
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