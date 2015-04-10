<?php namespace App\Http\Controllers;

use Config;
use Request;
use Session;
class CustomerController extends Controller {

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
		return view('index');
	}

	/**
	 * Shows The page where customers can enter search parameters and search for a flight
	 *
	 * @return Response
	 */
	public function flightsearch()
	{
		$locations = Queries::LocationList();
		return view('flightsearch')->with('locationList', $locations);
	}

	/**
	 * The page that shows all the search results based on what the customer searched
	 *
	 * @return Response
	 */
	public function flightsearchresults()
	{
		//Probably want to validate the input
		$location1 = Request::input('from');
		$location2 = Request::input('dest');
		$departDate = Request::input('departDate');

		$all_results = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT f.FlightNo, p.ProvName, (f.Capacity-count(t.SeatNum)), f.Capacity
				FROM 	Flight AS f,Provider AS p,Ticket AS t
				WHERE	f.ManagedBy = p.ProviderNum
				AND		t.OnFlightNumber = f.FlightNo
				AND		f.DepartingFrom = '".$location1."'
				AND 	f.ArrivingAt = '".$location2."'";
				if ($departDate!="")
					$query .= " AND 	DATEDIFF(DATE(f.DepartTime), '".$departDate."')=0 ";
				$query .= "GROUP BY f.FlightNo
				HAVING 	Count(t.SeatNum)<f.Capacity";
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		return view('flightsearchresults')->with('results', $all_results);
	}

	/**
	 * The confirmation page when the user books a flight
	 *
	 * @return Response
	 */
	public function flightbook($flightno)
	{
		$flightNumber = $flightno;	//Sanitize this?
		$input = array('First','Business','Economy','Cargo','Pilot');
		$cl = $input[rand(0,4)]; 
		$price = rand(400,10000);

		if($r = Queries::BookFlight($flightNumber,$cl, $price)) {
			return view('flightbook')->with('seatnum', $r)->with('class', $cl)->with('price',$price);
		}else{
			return redirect()->route('flight.search');
		}
	}
	/**
	 * Shows details for a specific flight
	 *
	 * @return Response
	 */
	public function flightdetails($flightno)
	{
		$all_results = array();

		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT f.FlightNo, f.DepartTime, f.ArriveTime, ld.CityName, la.CityName, p.ProvName, f.BaseTicketPrice, AVG(r.Rating) FROM 
						flight AS f, location AS ld, location AS la, review AS r, provider AS p 
						WHERE f.FlightNo = '".mysqli_real_escape_string($mysqli,$flightno)."' 
						AND ld.AirportCode = f.DepartingFrom 
						AND la.AirportCode = f.ArrivingAt 
						AND p.ProviderNum = f.ManagedBy 
						AND r.FlightNumber = f.FlightNo;";

			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_num_rows($result)==0) Session::flash('message', "Flight with that ID could not be found.".mysqli_num_rows($result));
				$details = mysqli_fetch_array($result);
			}else{
				Session::flash('message','Error executing search query.');
			}

			$query = "SELECT r.Rating, r.Comments FROM review AS r  
						WHERE r.FlightNumber='".mysqli_real_escape_string($mysqli,$flightno)."';";

			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
			return view('flightdetails')->with('details', $details)->with('reviews', $all_results);
	}

	/**
	 * The page showing hotel search parameters for the customer
	 *
	 * @return Response
	 */
	public function hotelsearch()
	{
		$locations = Queries::LocationList();
		return view('hotelsearch')->with('locationList', $locations);
	}

	/**
	 * The page showing hotel search results based off search parameters (POST)
	 *
	 * @return Response
	 */
	public function hotelsearchresults()
	{
		$location = Request::input('location');
		$checkindate = Request::input('checkindate');
		$nights = Request::input('nights');
		$all_results = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT  HotelName, Address, StartingPrice, h.Capacity
						FROM    Hotel AS h LEFT OUTER JOIN Reservation AS r ON h.Address = r.forhotel
						WHERE   BasedIn = '".$location."'
						AND     (r.CheckInDate IS NULL OR (DATEDIFF(DATE(r.CheckInDate), DATE('".$checkindate."'))<=0     AND        DATEDIFF(DATE('".$checkindate."'), DATE(r.CheckOutDate))>=0))
						GROUP BY h.Address
						HAVING  count(*)-1 < h.Capacity;";


				//print($query);
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		Session::flash('checkin',$checkindate);
		Session::flash('nights', $nights);
		return view('hotelsearchresults')->with('results',$all_results);
	}

	/**
	 * The page to book a hotel and show confirmation confirmation when user books a hotel
	 *
	 * @return Response
	 */
	public function hotelbook($id)
	{
		if (!Session::has("checkin")) {
			Session::flash("message","An error has occured. Please try searching again.");
			return redirect()->route('hotel.search');
		}

		$hotelID = $id;
		$checkindate = Session::get('checkin');
		$nights = Session::get('nights');
		print($checkindate);
		$price = rand(400,10000);
		$checkoutdate = date("Y-m-d", strtotime("+".$nights."days", strtotime($checkindate)));
		if ($r = Queries::BookHotel($hotelID, $checkindate, $nights, $price, $checkoutdate)) {
			return view('hotelbook')->with('checkindate', $checkindate)->with('price', $price)->with('roomno', $r)->with("nights", $nights);
		}else{
			return redirect()->route('hotel.search');
		}
	}

	/**
	 * Shows details/reviews for specified hotel
	 *
	 * @return Response
	 */
	public function hoteldetails($id)
	{
		$all_results = array();

		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT h.Address, h.HotelName, l.CityName, h.StartingPrice ,p.ProvName, AVG(r.Rating) FROM Hotel AS h, Provider AS p, review AS r, Location as l
						WHERE h.RunBy=p.ProviderNum 
						AND h.Address='".mysqli_real_escape_string($mysqli,$id)."' 
						AND r.HotelAddress=h.Address 
						AND l.AirportCode = h.BasedIn
						;";

			if ($result = mysqli_query($mysqli,$query)) {
				$details = mysqli_fetch_array($result);
			}else{
				Session::flash('message','Error executing search query.');
			}

			$query = "SELECT r.Rating, r.Comments FROM review AS r  
						WHERE r.HotelAddress='".mysqli_real_escape_string($mysqli,$id)."';";

			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
			return view('hoteldetails')->with('details', $details)->with('reviews', $all_results);
	
	}


	/**
	 * The page showing all of the travel packages
	 *
	 * @return Response
	 */
	public function packages()
	{
		$all_results = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT	PackName, DateOffered, Discount FROM	Package;"; 
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$all_results[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		return view('packages')->with('results', $all_results);
	}

	/**
	 * The page for when a customer books a travel package
	 *
	 * @return Response
	 */
	public function packagebook($id)
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			if ($result = mysqli_query($mysqli,"SELECT StayingAt, FlyingBy, DateOffered, Discount FROM package WHERE PackName = '".mysqli_real_escape_string($mysqli,$id)."'") ) {
				$packagedetails = mysqli_fetch_array($result);
			}
			$hotelID = $packagedetails['StayingAt'];
			$checkindate = $packagedetails['DateOffered'];
			$nights = 5;
			$price = rand(400,10000)*$packagedetails['Discount'];
			$checkoutdate = date("Y-m-d", strtotime("+".$nights."days", strtotime($checkindate)));
			if ($h = Queries::BookHotel($hotelID, $checkindate, $nights, $price, $checkoutdate)) {
				$flightNumber = $packagedetails['FlyingBy'];	//Sanitize this?
				$input = array('First','Business','Economy','Cargo','Pilot');
				$cl = $input[rand(0,4)]; 
				$flightprice = rand(400,10000);
					if($f = Queries::BookFlight($flightNumber,$cl, $flightprice)) {
						return view('packagebook')->with('bookinfo',
								array('hotelCheckIn' => $checkindate,
									'nights' => $nights,
									'hotelPrice' => $price,
									'flightclass' => $cl,
									'flightprice' => $flightprice,
									'flightseat' => $f,
									'hotelroom' => $h
									)
							);
					}
			}

			
		}
	

		return redirect()->route('package.browse');
	}

	/**
	 * The page showing order history for a customer
	 *
	 * @return Response
	 */
	public function orderhistory()
	{
		$flightResults = array();
		$hotelresults = array();
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT	f.FlightNo, f.ArrivingAt, f.DepartTime, t.SeatNum, t.Class, t.Price
					FROM	Ticket AS t, Flight AS f
					WHERE	t.OnFlightNumber = f.FlightNo
					AND 	t.BookedBy = '".Session::get('user.id')."';"; 
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$flightResults[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
			$query = "SELECT 	h.HotelName, h.BasedIn, r.CheckInDate, r.CheckInDate, r.CheckOutDate, h.Address
				FROM 	Reservation AS r, Hotel AS h
				WHERE 	r.ForHotel = h.Address
				AND 	r.PlacedBy = '".Session::get('user.id')."';"; 
			if ($result = mysqli_query($mysqli,$query)) {
				while ($r = mysqli_fetch_array($result)) {
			    	$hotelresults[] = $r;
				}
			}else{
				Session::flash('message','Error executing search query.');
			}
		}
		return view('orderhistory')->with('flightresults', $flightResults)->with('hotelresults', $hotelresults);
	}

	/**
	 * The page showing the textbox/rating to rate a hotel
	 *
	 * @return Response
	 */
	public function reviewhotel($id)
	{
		Session::set('hotelid', $id);
		return view('reviewhotel');
	}

	/**
	 * The page showing the confirmation and submitting the hotel review (POST)
	 *
	 * @return Response
	 */
	public function reviewhotelpost()
	{	
		$comments = Request::input('comments');
		$rating = Request::input('rating');
		if (!Session::has('hotelid')) {
			Session::flash('message','Session Error. Please try again.');
			return redirect()->route('order.history');
		}
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "INSERT INTO Review (Comments, Rating, LeftBy, HotelAddress, FlightNumber)
						VALUES	('{$comments}', '{$rating}', '".Session::get('user.id')."', '".Session::get('hotelid')."', NULL);";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error booking ticket.');
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		Session::forget('hotelid');
		return view('reviewpost');
	}

	/**
	 * The page showing the textbox/rating to rate a flight
	 *
	 * @return Response
	 */
	public function reviewflight($id)
	{
		Session::set('flightid', $id);
		return view('reviewflight');
	}

	/**
	 * The page showing the confirmation and submitting the flight review (POST)
	 *
	 * @return Response
	 */
	public function reviewflightpost()
	{
		$comments = Request::input('comments');
		$rating = Request::input('rating');
		if (!Session::has('flightid')) {
			Session::flash('message','Session Error. Please try again.');
			return redirect()->route('order.history');
		}
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "INSERT INTO Review (Comments, Rating, LeftBy, HotelAddress, FlightNumber)
						VALUES	('{$comments}', '{$rating}', '".Session::get('user.id')."', NULL, '".Session::get('flightid')."');";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error booking ticket.');
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		Session::forget('flightid');
		return view('reviewpost');
	}

}
