<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
          if(Auth::user()->isAdmin())
          {
              return $next($request);
          }
        }
        //return redirect()->intended();
        return redirect('/admin');
    }
}
