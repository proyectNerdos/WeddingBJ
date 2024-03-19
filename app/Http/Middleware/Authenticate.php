<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Session;
use Closure;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    // public function handle($request, Closure $next, $guard = null)
    // {
     
    //     //comprobar que el user este logueado con Auth::check
      
    //     if (Auth::check()) {
    //         return $next($request);
    //     }else{
    //       //es donde me redirecciona si no estoy logueado
    //       return redirect()->guest('/login');      
    //     }



    
    //     // if (Auth::guard($guard)->guest()) {
           
    //     //     if ($request->ajax() || $request->wantsJson()) {

    //     //         return response('Unauthorized.', 401);
    //     //     } else {
    //     //         //es donde me redirecciona si no estoy logueado
    //     //         return redirect()->guest('/login');
    //     //     }
    //     // }


    //     //comprobamos que el usuario logueado haiga confirmado su email
    //     // if (Auth::user()->confirmed == 1) {
    //     //    return $next($request);
    //     // }else{
    //     //     return redirect()->guest('registrarse-respuesta');
    //     // }

        
    // }
}
