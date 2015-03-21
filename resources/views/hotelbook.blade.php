 @extends('layouts.master')

 @section('content') 
 <h3>Hotel Booking</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Confirmation</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Check-in Date:</label>
      <div class="col-lg-10">
        Last Thursday.
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Price</label>
      <div class="col-lg-10">
        $888.888 per hour
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Room No.</label>
      <div class="col-lg-10">
        42
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 ">Length of Stay</label>
      <div class="col-lg-10">
        5 Nights
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 "></label>
      <div class="col-lg-10">
        <button type="button" class="btn btn-success">Confirm</button>
      </div>
    </div>
    
  </fieldset>
</form>
@stop