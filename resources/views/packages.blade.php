 @extends('layouts.master')

 @section('content') 
 <h3>Available Packages</h3>
  <?php if (count($results)==0) {print ("No results were returned."); }else{ ?>
 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Package Name</th>
      <th>Date Offered</th>
      <th>Discount</th>
      <th style="text-align: center;">Book</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($results as $result) { ?>
    <tr>
      <td>{{$result['PackName']}}</td>
      <td>{{$result['DateOffered']}}</td>
      <td>{{$result['Discount']*100}}% off</td>
      <td style="text-align: center;"><a href="{{ route('package.book', $result['PackName']) }}"><button class="btn btn-primary btn-xs" type="button">Book Now!</button></a></td>
    </tr>
       <?php } ?>
  </tbody>
</table> 
<?php } ?>
@stop