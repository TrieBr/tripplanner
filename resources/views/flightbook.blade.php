 @extends('layouts.master')

 @section('content') 
 <h3>Flight Booking</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Confirmation</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Seat Number: </label>
      <div class="col-lg-10">
        {{$seatnum}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Class </label>
      <div class="col-lg-10">
        {{$class}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Price</label>
      <div class="col-lg-10">
        <?php print("$".number_format(floatval($price),2)); ?>
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