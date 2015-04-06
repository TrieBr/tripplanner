<?php namespace App\Http\Middleware;

use Closure;
use Session;

class AuthManager {

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
		if (Session::get('user.type')!="SysManager") {
			return redirect()->route('login');
		}
		return $next($request);
	}

}
