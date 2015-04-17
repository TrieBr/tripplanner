<?php namespace App\Http\Controllers;

use Request;
use Config;
use Session;
use mysqli;
class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

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
	 * Show the application login screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('login');
	}

	/**
	 * login was posted
	 *
	 * @return Response
	 */
	public function post()
	{
		$username = Request::input('user');
		$password = Request::input('password');
		$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
		if (!$mysqli)
		{
			Session::flash('message','Error connecting to database.');
		}else{
			$query = "SELECT UserNum, UserType FROM userpass WHERE Username = '".$username."' AND Password = '".$password."';";
			if ($result = mysqli_query($mysqli,$query)) {
				if (mysqli_num_rows($result)==1) {
					$row = $result->fetch_array();
					Session::put('user.id',$row['UserNum']);
					Session::put('user.type',$row['UserType']);
					Session::put('user.name',$username);
					if ($row['UserType']=="Customer") {
						$query = "SELECT c.CustomerNum FROM customer AS c
									WHERE c.UserId=".$row['UserNum'].";";
						if ($result = mysqli_query($mysqli,$query)) {
							$row = $result->fetch_array(); 
							Session::put('customer.id', $row['CustomerNum']);
							return redirect()->route('index'); //view('login');
						}
					}else if ($row['UserType']=="Provider") {
						$query = "SELECT p.ProviderNum, p.ProvName, p.ProviderType FROM provider AS p
									WHERE p.UserId=".$row['UserNum'].";";
						if ($result = mysqli_query($mysqli,$query)) {
							$row = $result->fetch_array(); 
							Session::put('provider.id', $row['ProviderNum']);
							Session::put('provider.type', $row['ProviderType']);
							return redirect()->route('provider.index'); //view('login');
						}
					}else if ($row['UserType']=="SysManager") {
						$query = "SELECT s.ManagerNum FROM sysmanager AS s
									WHERE s.UserId=".$row['UserNum'].";";
						if ($result = mysqli_query($mysqli,$query)) {
							$row = $result->fetch_array(); 
							Session::put('manager.id', $row['ManagerNum']);
							return redirect()->route('manager.index'); //view('login');
						}
					}
				}
			}	
				Session::flash('message','Invalid credentials');
				return view('login');	//Error has occured
		}
		return view('login');	//Error has occured	
	}
	/*
	User is logging out

	*/
	public function logout()
	{
		Session::flush();
		return redirect()->route('login');
	}
}
