<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserstatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::whereEmail(auth()->user()->email)
                    ->first();
        if($user->status){
            auth()->logout();
            return redirect()->route('user.login')
                             ->withErrors(['email'=>'you have been banned on '.
                             $user->updated_at->toDayDateTimeString().' contact the 
                             admin for more info'])->onlyInput('email');
        }
        return $next($request);
    }
}
