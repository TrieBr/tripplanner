<?php namespace App\Http\Controllers;

use Config;
use Session;
use Input;
class ProviderController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Shows the index page for the Customer (Where they select what they want to do (search hotels, flights, packages))
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('provider.index');
	}

	/**
	 * Shows the page where the provider can enter details to add a new flight
	 *
	 * @return Response
	 */
	public function flightadd()
	{
		$locations = Queries::LocationList();
		return view('provider.flightadd')->with('locationList', $locations);
	}

	/**
	 * Page visited when the provider submits the information to add a flight (POST)
	 *
	 * @return Response
	 */
	public function flightaddpost()
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		$flightno = mysqli_real_escape_string($mysqli,Input::get('flightno'));
		$departdate = mysqli_real_escape_string($mysqli,Input::get('departdate'));
		$departtime = mysqli_real_escape_string($mysqli,Input::get('departtime'));
		$arrivedate = mysqli_real_escape_string($mysqli,Input::get('arrivedate'));
		$arrivetime = mysqli_real_escape_string($mysqli,Input::get('arrivetime'));
		$capacity = mysqli_real_escape_string($mysqli,Input::get('flightcapacity'));
		$departlocation = mysqli_real_escape_string($mysqli,Input::get('departlocation'));
		$arrivelocation = mysqli_real_escape_string($mysqli,Input::get('arrivelocation'));
		$flightprice = mysqli_real_escape_string($mysqli,Input::get('flightprice'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "INSERT INTO     flight(FlightNo, DepartTime, ArriveTime, DepartingFrom, ArrivingAt, ManagedBy, Capacity, BaseTicketPrice)
					VALUES          ('".$flightno."', '".$departdate.' '.$departtime."', '".$arrivedate.' '.$arrivetime."', '".$departlocation."', '".$arrivelocation."', ".Session::get('provider.id').", ".$capacity.", ".$flightprice.");";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Adding Flight!');
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}

		$query = "	INSERT INTO ConnectsTo
						VALUES    ((SELECT  f.FlightNo
			           FROM     Flight AS f, Flight AS ff
			           WHERE    ff.FlightNo = '".$flightno."'
			           AND      f.DepartingFrom = ff.ArrivingAt
			           AND      TIMESTAMPDIFF(hour, DATE(f.ArriveTime), DATE(ff.DepartTime)) BETWEEN 0 AND 4)
			           , '".$flightno."'),
			           
			           ('".$flightno."', (SELECT    ff.FlightNo
			                          FROM      Flight AS f, Flight AS ff
			                          WHERE     f.FlightNo = '".$flightno."'
			                          AND       f.ArrivingAt= ff.DepartingFrom
			                          AND       TIMESTAMPDIFF(hour, DATE(f.ArriveTime), DATE(ff.DepartTime)) BETWEEN 0 AND 4));";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Adding Connection!');
				}
			}else{
				Session::flash('message','Error executing Connection query.'.$query);
			}


		return view('provider.updateaddpost');
	}

	/**
	 * List all of the flights the provider controls
	 *
	 * @return Response
	 */
	public function flightlist()
	{
		$all_results = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT  FlightNo, DepartingFrom, ArrivingAt
						FROM    flight
						WHERE   ManagedBy = ".Session::get('provider.id').";";


				//print($query);
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		return view('provider.flightlist')->with('flights', $all_results);
	}

	/**
	 * Update a specific flight
	 *
	 * @return Response
	 */
	public function flightupdate($id)
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT f.FlightNo, f.DepartTime, f.ArriveTime, ld.CityName, la.CityName, p.ProvName, f.BaseTicketPrice, f.Capacity FROM 
						flight AS f, location AS ld, location AS la, provider AS p 
						WHERE f.FlightNo = '".mysqli_real_escape_string($mysqli,$id)."' 
						AND ld.AirportCode = f.DepartingFrom 
						AND la.AirportCode = f.ArrivingAt 
						AND p.ProviderNum = f.ManagedBy;";

			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_num_rows($result)==0) Session::flash('message', "Flight with that ID could not be found.".mysqli_num_rows($result));
				$details = mysqli_fetch_array($result);
			}else{
				Session::flash('message','Error executing search query.');
			}
	
		}
		return view('provider.flightupdate')->with('details', $details);
	}

	/**
	 * Update a specific flight, page visited when the provider presses update (POST)
	 *
	 * @return Response
	 */
	public function flightupdatepost($id)
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		$flightno = mysqli_real_escape_string($mysqli,Input::get('flightno'));
		$departdate = mysqli_real_escape_string($mysqli,Input::get('departdate'));
		$capacity = mysqli_real_escape_string($mysqli,Input::get('capacity'));
		$price = mysqli_real_escape_string($mysqli,Input::get('price'));
		
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "UPDATE flight SET FlightNo='".$flightno."', DepartTime='".$departdate."', Capacity=".$capacity.", BaseTicketPrice=".$price."
						WHERE FlightNo = '".$id."';";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Updating Flight!'. $query);
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		return view('provider.updateaddpost');
	}

	/**
	 * Shows the page where the provider can enter details to add a new hotel
	 *
	 * @return Response
	 */
	public function hoteladd()
	{
		$locations = Queries::LocationList();
		return view('provider.hoteladd')->with('locationList', $locations);
	}

	/**
	 * Page visited when the provider submits the information to add a hotel (POST)
	 *
	 * @return Response
	 */
	public function hoteladdpost()
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		$name = mysqli_real_escape_string($mysqli,Input::get('name'));
		$address= mysqli_real_escape_string($mysqli,Input::get('address'));
		$capacity = mysqli_real_escape_string($mysqli,Input::get('capacity'));
		$location = mysqli_real_escape_string($mysqli,Input::get('location'));
		$price = mysqli_real_escape_string($mysqli,Input::get('price'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "INSERT INTO    Hotel
VALUES          ('".$address."', ".$capacity.", '".$name."', '".$location."', ".Session::get('provider.id').", ".$price.");";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Adding Hotel!');
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		return view('provider.updateaddpost');
	}

	/**
	 * List all of the hotels the provider controls
	 *
	 * @return Response
	 */
	public function hotellist()
	{
		$all_results = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT  HotelName, Address
					FROM    hotel
					WHERE   RunBy = ".Session::get('provider.id').";";


				//print($query);
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		return view('provider.hotellist')->with('hotels', $all_results);
	}

	/**
	 * Update a specific hotel
	 *
	 * @return Response
	 */
	public function hotelupdate($id)
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT *  FROM Hotel AS h
						WHERE h.Address='".mysqli_real_escape_string($mysqli,$id)."';";

			if ($result = mysqli_query($mysqli,$query)) {
				$details = mysqli_fetch_array($result);
			}else{
				Session::flash('message','Error executing search query.');
			}

		
		}
		return view('provider.hotelupdate')->with('details', $details);
	}

	/**
	 * Update a specific hotel, page visited when the provider presses update (POST)
	 *
	 * @return Response
	 */
	public function hotelupdatepost($id)
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		$name = mysqli_real_escape_string($mysqli,Input::get('name'));
		$address = mysqli_real_escape_string($mysqli,Input::get('address'));
		$capacity = mysqli_real_escape_string($mysqli,Input::get('capacity'));
		$price = mysqli_real_escape_string($mysqli,Input::get('price'));
		
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "UPDATE hotel SET HotelName='".$name."', Address='".$address."', Capacity=".$capacity.", StartingPrice=".$price."
						WHERE Address = '".$id."';";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Updating Flight!'. $query);
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		return view('provider.updateaddpost');
	}
	

}
