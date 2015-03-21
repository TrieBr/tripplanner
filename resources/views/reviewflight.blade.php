 @extends('layouts.master')

 @section('content') 
  <form class="form-horizontal" action="{{ route('flight.review.post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Review Flight</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Comments</label>
                    <div class="col-lg-10">
                     <textarea class="form-control" rows="3"></textarea>
                    </div>
                  </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Rating</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputEmail" placeholder="Rating (from 1 to 5)">
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