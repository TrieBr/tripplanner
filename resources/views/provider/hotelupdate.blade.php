 @extends('layouts.masterprovider')

 @section('content') 
  <form class="form-horizontal" action="{{ route('provider.hotel.update.post', $details['Address']) }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <legend>Update Hotel</legend>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Hotel Name" name="name" value="{{$details['HotelName']}}">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Address" name="address" value="{{$details['Address']}}" readonly>
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Capacity</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Max. Capacity" name="capacity" value="{{$details['Capacity']}}">
                    </div>
    </div>
    <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Room Price</label>
                    <div class="col-lg-10">
                     <input type="text" class="form-control" id="inputEmail" placeholder="Price/Night" name="price" value="{{$details['StartingPrice']}}">
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