<?php

namespace App\Http\Middleware;

use App\Config;
use Closure;

class SiteStatusMiddleWare
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \Closure $next
    *
    * @return mixed
    */
   public function handle($request, Closure $next)
   {
      if(Config::where('name', 'SITE_ENABLED')->first()->value === 'true') {
         return $next($request);
      } else {
         return abort(404);
      }
   }
}
