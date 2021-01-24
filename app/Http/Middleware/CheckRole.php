<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
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
        $allowed_list = array_slice(func_get_args(), 2);  
        if (Auth::check()) {
            $status = Auth::user()->role;
            //IF $status OF USER IS IN ALLOWED LIST
            if (in_array($status, $allowed_list,True)){
                return  $next($request);
            }
        } 
        return redirect('/home');

    }
}
