<?php namespace App\Http\Controllers;

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
		return view('flightsearch');
	}

	/**
	 * The page that shows all the search results based on what the customer searched
	 *
	 * @return Response
	 */
	public function flightsearchresults()
	{
		return view('flightsearchresults');
	}

	/**
	 * The confirmation page when the user books a flight
	 *
	 * @return Response
	 */
	public function flightbook()
	{
		return view('flightbook');
	}

	/**
	 * The page showing hotel search parameters for the customer
	 *
	 * @return Response
	 */
	public function hotelsearch()
	{
		return view('hotelsearch');
	}

	/**
	 * The page showing hotel search results based off search parameters (POST)
	 *
	 * @return Response
	 */
	public function hotelsearchresults()
	{
		return view('hotelsearchresults');
	}

	/**
	 * The page to book a hotel and show confirmation confirmation when user books a hotel
	 *
	 * @return Response
	 */
	public function hotelbook()
	{
		return view('hotelbook');
	}


	/**
	 * The page showing all of the travel packages
	 *
	 * @return Response
	 */
	public function packages()
	{
		return view('packages');
	}

	/**
	 * The page for when a customer books a travel package
	 *
	 * @return Response
	 */
	public function packagebook()
	{
		return view('packagebook');
	}

	/**
	 * The page showing order history for a customer
	 *
	 * @return Response
	 */
	public function orderhistory()
	{
		return view('orderhistory');
	}

	/**
	 * The page showing the textbox/rating to rate a hotel
	 *
	 * @return Response
	 */
	public function reviewhotel()
	{
		return view('reviewhotel');
	}

	/**
	 * The page showing the confirmation and submitting the hotel review (POST)
	 *
	 * @return Response
	 */
	public function reviewhotelpost()
	{
		return view('reviewpost');
	}

	/**
	 * The page showing the textbox/rating to rate a flight
	 *
	 * @return Response
	 */
	public function reviewflight()
	{
		return view('reviewflight');
	}

	/**
	 * The page showing the confirmation and submitting the flight review (POST)
	 *
	 * @return Response
	 */
	public function reviewflightpost()
	{
		return view('reviewpost');
	}

}
