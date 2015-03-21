<?php namespace App\Http\Controllers;

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
		return view('provider.flightadd');
	}

	/**
	 * Page visited when the provider submits the information to add a flight (POST)
	 *
	 * @return Response
	 */
	public function flightaddpost()
	{
		return view('provider.updateaddpost');
	}

	/**
	 * List all of the flights the provider controls
	 *
	 * @return Response
	 */
	public function flightlist()
	{
		return view('provider.flightlist');
	}

	/**
	 * Update a specific flight
	 *
	 * @return Response
	 */
	public function flightupdate()
	{
		return view('provider.flightupdate');
	}

	/**
	 * Update a specific flight, page visited when the provider presses update (POST)
	 *
	 * @return Response
	 */
	public function flightupdatepost()
	{
		return view('provider.updateaddpost');
	}

	/**
	 * Shows the page where the provider can enter details to add a new hotel
	 *
	 * @return Response
	 */
	public function hoteladd()
	{
		return view('provider.hoteladd');
	}

	/**
	 * Page visited when the provider submits the information to add a hotel (POST)
	 *
	 * @return Response
	 */
	public function hoteladdpost()
	{
		return view('provider.updateaddpost');
	}

	/**
	 * List all of the hotels the provider controls
	 *
	 * @return Response
	 */
	public function hotellist()
	{
		return view('provider.hotellist');
	}

	/**
	 * Update a specific hotel
	 *
	 * @return Response
	 */
	public function hotelupdate()
	{
		return view('provider.hotelupdate');
	}

	/**
	 * Update a specific hotel, page visited when the provider presses update (POST)
	 *
	 * @return Response
	 */
	public function hotelupdatepost()
	{
		return view('provider.updateaddpost');
	}
	

}
