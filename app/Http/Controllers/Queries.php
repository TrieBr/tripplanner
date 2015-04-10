<?php namespace App\Http\Controllers;
	use Config;
	use Session;
	class Queries {
		public static function LocationList() {
			$all_results = array();
			$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
			if (!$mysqli)
			{
				Session::flash('message','Error connecting to database.');
			}else{
				$query = "SELECT AirportCode, CityName FROM location;";

				if ($result = mysqli_query($mysqli,$query)) {
					while ($r = mysqli_fetch_array($result)) {

				    $all_results[] = $r;
					}
				}	
			}
			return $all_results;
		}

		public static function BookHotel($hotelID, $checkindate, $nights, $price, $checkoutdate) {
			$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
			if (!$mysqli)
			{
				Session::flash('message','Error connecting to database.');
				return false;
			}else{
				if ($result = mysqli_query($mysqli,"(SELECT Count(*) FROM Reservation WHERE ForHotel = '".mysqli_real_escape_string($mysqli,$hotelID)."')") ) {
					$roomnum = mysqli_fetch_array($result);
				}
				$query = "INSERT INTO Reservation
							VALUES ('{$checkindate}', ".$roomnum[0].", ".$price.", '{$checkoutdate}', '".mysqli_real_escape_string($mysqli,$hotelID)."', '".mysqli_real_escape_string($mysqli,Session::get('user.id'))."');";
				if ($result = mysqli_query($mysqli,$query)) {
					if (mysqli_affected_rows($mysqli)==0) {
						Session::flash('message','Error booking reservation.');
						return false;
					}
				}else{
					Session::flash('message','Error executing query.');
					return false;
				}
			}
			return $roomnum[0];
		}
		public static function BookFlight($flightNumber, $cl, $price) {
			$mysqli = mysqli_connect(Config::get('database.host'),Config::get('database.username'),Config::get('database.password'),Config::get('database.database'));
			if (!$mysqli)
			{
				Session::flash('message','Error connecting to database.');
				return false;
			}else{
				if ($result = mysqli_query($mysqli,"(SELECT count(*) FROM Ticket WHERE OnFlightNumber = '".mysqli_real_escape_string($mysqli,$flightNumber)."')") ) {
					$seatNum = mysqli_fetch_array($result);
				}
				
				$query = "	INSERT INTO Ticket
							VALUES (".$seatNum[0].",
								'".$cl."',
								".$price.",
								'".mysqli_real_escape_string($mysqli,$flightNumber)."',
								(SELECT DepartTime FROM flight WHERE FlightNo = '".mysqli_real_escape_string($mysqli,$flightNumber)."'),
								".Session::get('user.id').");";
				if ($result = mysqli_query($mysqli,$query)) {
					if (mysqli_affected_rows($mysqli)==0) {
						Session::flash('message','Error booking ticket.');
						return false;
					}
				}else{
					Session::flash('message','Error executing query. '.mysqli_error($mysqli));
					return false;
				}
			}
			return $seatNum[0];
		}

	}
?>