 @extends('layouts.masterprovider')

 @section('content') 
  <form class="form-horizontal" action="{{ route('provider.flight.add.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Add a Flight</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Number</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight No." name="flightno" maxlength="7" required>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Date of Flight</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="flightdate" placeholder="Departure Date" name="departdate" required>
                     <input type="text" class="form-control" id="flighttimedepart" placeholder="Departure Time" name="departtime" required>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Date of Arrival</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="flightdatearrive" placeholder="Arrival Date" name="arrivedate" required>
                     <input type="text" class="form-control" id="flighttimearrive" placeholder="Arrival Time" name="arrivetime" required>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Capacity</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight Capacity" name="flightcapacity" required>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Airport of Departure</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select" name="departlocation">
                         <?php foreach($locationList as $location)
                          echo "<option value='".$location['AirportCode']."'>".$location['CityName']."</option>";
                      ?>
                      </select>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Airport of Arrival</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select" name="arrivelocation">
                         <?php foreach($locationList as $location)
                          echo "<option value='".$location['AirportCode']."'>".$location['CityName']."</option>";
                      ?>
                      </select>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Ticket Base Price</label>
                    <div class="col-lg-10">
                     <input type="number" class="form-control" id="inputEmail" placeholder="Flight Ticket Base Price" name="flightprice" required>
                    </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

<script>
$('#flightdate').datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true
});
$('#flightdatearrive').datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true
});
$('#flighttimedepart').timepicker({ 'timeFormat': 'H:i:s' });
$('#flighttimearrive').timepicker({ 'timeFormat': 'H:i:s' });
</script>
@stop