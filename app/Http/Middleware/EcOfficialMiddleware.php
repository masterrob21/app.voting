<?php

namespace App\Http\Middleware;

use App\Models\Ec_Official;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EcOfficialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userid = Auth()->user()->id;
        
        $ecOfficial = DB::table('ec__Officials')->where('userid', $userid)->get();

        if(count($ecOfficial) == 0){
            return response(view('message.index'));
        }
        return $next($request);
        
    }
}