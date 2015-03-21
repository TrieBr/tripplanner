 @extends('layouts.master')

 @section('content') 
 <h3>Flight Booking</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Confirmation</legend>
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
    <div class="form-group">
      <label class="col-lg-2 "></label>
      <div class="col-lg-10">
        <button type="button" class="btn btn-success">Confirm</button>
      </div>
    </div>
    
  </fieldset>
</form>
@stop