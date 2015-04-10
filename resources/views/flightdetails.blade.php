 @extends('layouts.master')

 @section('content') 
 <h3>Flight Details</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Information</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Flight Number</label>
      <div class="col-lg-10">
        {{$details['FlightNo']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Departure Time</label>
      <div class="col-lg-10">
        {{$details['DepartTime']}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Arrival Time</label>
      <div class="col-lg-10">
        {{$details['ArriveTime']}}
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 ">Departing From</label>
      <div class="col-lg-10">
        {{$details[3]}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Arriving to</label>
      <div class="col-lg-10">
      {{$details[4]}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Provider</label>
      <div class="col-lg-10">
        {{$details['ProvName']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Base Price</label>
      <div class="col-lg-10">
        ${{number_format($details['BaseTicketPrice'])}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Average Rating</label>
      <div class="col-lg-10">
        {{$details[7]}}
      </div>
    </div>
  </fieldset>
</form>
 <h3>Reviews</h3>
<hr/>
<?php foreach($reviews as $review) { ?>
<div class="panel panel-default">
  <div class="panel-heading">{{$review['Rating']}}/5</div>
  <div class="panel-body">
    {{$review['Comments']}}
  </div>
</div>

<?php } ?>
@stop