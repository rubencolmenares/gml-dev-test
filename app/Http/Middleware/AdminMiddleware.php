<?php

namespace App\Http\Middleware;
use DB;
use Closure;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$user = User::where()
        //if (auth()->check() && auth()->user()->id_categories == 4){
        if (auth()->check() && auth()->user()->id_categories == 4){
            return $next($request);
            //redirect('home');
        }else{
            return redirect('login');
        }
    }
}
