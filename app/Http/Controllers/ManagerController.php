<?php namespace App\Http\Controllers;

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
		return view('manager.packageadd');
	}

	/**
	 * Shows the page to confirm the package has been added (POST)
	 *
	 * @return Response
	 */
	public function packageaddpost()
	{
		return view('manager.packageaddpost');
	}


}
