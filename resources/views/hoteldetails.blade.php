 @extends('layouts.master')

 @section('content') 
 <h3>Hotel Details</h3>
 <form class="form-horizontal">
  <fieldset>
    <legend>Information</legend>
    <div class="form-group">
      <label class="col-lg-2 ">Name</label>
      <div class="col-lg-10">
        {{$details['HotelName']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Location</label>
      <div class="col-lg-10">
        {{$details['CityName']}}
      </div>
    </div>
   <div class="form-group">
      <label class="col-lg-2 ">Address</label>
      <div class="col-lg-10">
        {{$details['Address']}}
      </div>
    </div>
     <div class="form-group">
      <label class="col-lg-2 ">Starting Price</label>
      <div class="col-lg-10">
        ${{number_format($details['StartingPrice'])}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Provider Name</label>
      <div class="col-lg-10">
      {{$details['ProvName']}}
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 ">Average Rating</label>
      <div class="col-lg-10">
        {{$details[5]}}
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