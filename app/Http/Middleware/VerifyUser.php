<?php

namespace App\Http\Middleware;

use Closure;
// use App\User;
class VerifyUser
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
        if(!auth()->user()->isAdmin()){

            $request->session()->flash('error', 'You are not Admin.');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
