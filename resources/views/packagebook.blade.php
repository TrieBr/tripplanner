 @extends('layouts.master')

 @section('content') 
 <h3>Package Booked Sucessfully!</h3>
  <form class="form-horizontal">
  <fieldset>
    <legend>Flight Details</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Seat Number: </label>
      <div class="col-lg-10">
        23
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Class </label>
      <div class="col-lg-10">
        The Best Class
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Price</label>
      <div class="col-lg-10">
        $19,234.99
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
      </div>
    </div>
    
  </fieldset>
</form>
@stop