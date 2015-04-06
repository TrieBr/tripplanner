<?php namespace App\Http\Middleware;

use Closure;
use Session;
use Route;

class AuthConsumer {

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
		if (Session::get('user.type')!="Customer") {
			return redirect()->route('login');
		}
		return $next($request);
	}

}
