 @extends('layouts.master')

 @section('content') 
  <form class="form-horizontal" action="{{ route('flight.search.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Search for Flights</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">From</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="from">
                      <?php foreach($locationList as $location)
                          echo "<option value='".$location['AirportCode']."'>".$location['CityName']."</option>";
                      ?>
                      </select>
                    </div>
                  </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">To</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="dest">
                        <?php foreach($locationList as $location)
                          echo "<option value='".$location['AirportCode']."'>".$location['CityName']."</option>";
                      ?>
                      </select>
                    </div>
                  </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Date</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="departDate" placeholder="Date" name="departDate">
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
$('#departDate').datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true
});
</script>
@stop