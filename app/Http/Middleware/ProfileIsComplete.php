<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(
            auth()->user()->id_ktp == null ||
            auth()->user()->tgl_lahir == null ||
            auth()->user()->jenis_kelamin == null ||
            auth()->user()->no_hp == null
        ) {
            return redirect()->route('lengkapi-profil');
        }
        return $next($request);
    }
}
