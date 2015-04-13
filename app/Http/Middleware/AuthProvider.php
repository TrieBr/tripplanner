<?php namespace App\Http\Middleware;

use Closure;
use Session;
use Route;


class AuthProvider {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!Session::has('user.id')) {
			return redirect()->route('login');
		}
		if (Session::get('user.type')!="Provider") {
			return redirect()->route('login');
		}
		if (!(strpos(Route::currentRouteName(),"flight.")===FALSE)) {
			if (Session::get('provider.type')!="Flight") {
				return redirect()->route('login');
			}
		}
		if (!(strpos(Route::currentRouteName(),"hotel.")===FALSE)) {
			if (Session::get('provider.type')!="Hotel") {
				return redirect()->route('login');
			}
		}
		return $next($request);
	}

}
