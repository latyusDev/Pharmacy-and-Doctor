<?php

namespace App\Http\Middleware;

use App\Models\Pharmacy;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PharmacyStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pharmacy = Pharmacy::whereEmail(auth('pharmacy')->user()->email)
                            ->first();
        if($pharmacy->status){
            auth('pharmacy')->logout();
            return redirect()->route('pharmacy.login')
                             ->withErrors(['email'=>'you have been banned on '.
                             $pharmacy->updated_at->toDayDateTimeString().' contact the 
                             Admin for more info'])->onlyInput('email');
        }
        return $next($request);
    }
}
