 @extends('layouts.master')

 @section('content') 
  <form class="form-horizontal" action="{{ route('hotel.search.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Search for Hotels</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Location</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Date</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Date">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Nights</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="# of Nights">
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