 @extends('layouts.masterprovider')

 @section('content') 
  <form class="form-horizontal" action="{{ route('provider.hotel.add.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Add a Hotel</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Hotel Name</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Hotel Name">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Hotel Address">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Capacity</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Max. Capacity">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Location</label>
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
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@stop