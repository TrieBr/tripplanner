 @extends('layouts.masterprovider')

 @section('content') 
  <form class="form-horizontal" action="{{ route('provider.flight.add.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Add a Flight</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Number</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight No.">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Date of Flight</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Departure Date">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Capacity</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight Capacity">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Airport of Departure</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select">
                        <option>Calgary</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Airport of Arrival</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select">
                        <option>Vancouver</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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