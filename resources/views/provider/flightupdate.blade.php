 @extends('layouts.masterprovider')

 @section('content') 
  <form class="form-horizontal" action="{{ route('provider.flight.update.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Update Flight</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Number</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight No.">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Delay</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight Delay">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight Capacity</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Flight Capacity">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Price">
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