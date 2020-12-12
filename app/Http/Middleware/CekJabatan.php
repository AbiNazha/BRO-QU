<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class CekJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->jabatan,$levels)){
            return $next($request);
        }
        return Redirect::back();
    }

}
