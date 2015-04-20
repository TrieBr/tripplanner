 @extends('layouts.mastermanager')

 @section('content') 
  <form class="form-horizontal" action="{{ route('manager.package.add.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Add a Package</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Name" name="name" required>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Discount</label>
                    <div class="col-lg-10">
                     <input type="number" class="form-control" id="inputEmail" placeholder="% Discount" name="discount" min="1" max="100">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select" name="flight">
                        <?php foreach($flightlist as $flight)
                          echo "<option value='".$flight['FlightNo']."'>".$flight['FlightNo']."</option>";
                      ?>
                      </select>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Hotel</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select" name="hotel">
                        <?php foreach($hotellist as $hotel)
                          echo "<option value='".$hotel['Address']."'>".$hotel['HotelName']."</option>";
                      ?>
                      </select>
                    </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@stop