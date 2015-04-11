<?php namespace App\Http\Controllers;

use Config;
use Session;
use Input;
class ManagerController extends Controller {

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
	 * Shows the index page for the Manager
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('manager.index');
	}

	/**
	 * Shows the page to enter information to add a new package
	 *
	 * @return Response
	 */
	public function packageadd()
	{
		
		return view('manager.packageadd')->with('flightlist',Queries::FlightList())->with('hotellist', Queries::HotelList());
	}

	/**
	 * Shows the page to confirm the package has been added (POST)
	 *
	 * @return Response
	 */
	public function packageaddpost()
	{
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		$name = mysqli_real_escape_string($mysqli,Input::get('name'));
		$discount = mysqli_real_escape_string($mysqli,Input::get('discount'))/100;
		$flight = mysqli_real_escape_string($mysqli,Input::get('flight'));
		$hotel = mysqli_real_escape_string($mysqli,Input::get('hotel'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "INSERT INTO Package
				VALUES     ('".$name."', DATE(NOW()),".$discount.", '".$hotel."', '".$flight."', ".Session::get('manager.id').");";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_affected_rows($mysqli)==0) {
					Session::flash('message','Error Adding Package!');
				}
			}else{
				Session::flash('message','Error executing query.');
			}
		}
		return view('manager.packageaddpost');
	}


}
