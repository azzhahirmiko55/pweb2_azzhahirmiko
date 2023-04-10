<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $status): Response
    {
        $user = Auth::user();

        if ($user) {
            if ($user->status == $status) {
                return $next($request);
            } else {
                return back()->with('error', 'Invalid user type.');
            }
        }
        return redirect('login');
    }
}
