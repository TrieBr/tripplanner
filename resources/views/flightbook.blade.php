 @extends('layouts.master')

 @section('content') 
 <h3>Flight Booking</h3>

 <?php foreach($tickets as $ticket) { ?>
 <form class="form-horizontal">
  <fieldset>
    <legend>Confirmation (Flight Number: {{$ticket['flightnum']}})</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Seat Number: </label>
      <div class="col-lg-10">
        {{$ticket['seatnum']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Class </label>
      <div class="col-lg-10">
        {{$ticket['class']}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Price</label>
      <div class="col-lg-10">
        <?php print("$".number_format(floatval($ticket['price']),2)); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 "></label>
      <div class="col-lg-10">
      </div>
    </div>
    
  </fieldset>
</form>
<?php } ?>
@stop