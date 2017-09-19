<?php

namespace App\Http\Middleware;

use Closure;
use App\Forum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OwnerDiscussion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            return redirect()->guest('login');
        }
        else if(Auth::user()->id == Forum::find(Session::get('forum'))->user->id || Auth::user()->type_utilisateur->terme == "admin"){
            return $next($request);
        }
        return back();
    }
}
