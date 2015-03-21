 @extends('layouts.mastermanager')

 @section('content') 
  <form class="form-horizontal" action="{{ route('manager.package.add.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Add a Package</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Name">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Discount</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="% Discount">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Flight</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select">
                        <option>3455</option>
                        <option>34</option>
                        <option>646</option>
                        <option>346</option>
                        <option>3466</option>
                      </select>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Hotel</label>
                    <div class="col-lg-10">
                     <select class="form-control" id="select">
                        <option>Calgary Hotel</option>
                        <option>Hotel 2</option>
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