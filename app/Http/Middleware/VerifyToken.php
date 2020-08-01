<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class VerifyToken
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
        $token = $request->bearerToken();

        if($token === null) {
            return response()->json([
                'message' => 'Forbidden'
            ], 403);
        }

        $user       = User::where('token', $token);
        $validUser  = $user->first();

        if(is_null($validUser)) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }
        
        return $next($request);
    }
}
