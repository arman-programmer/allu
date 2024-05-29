<?php

namespace App\Http\Middleware;

use App\Models\Account\UserConfirms;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $session_id = $request->session()->getId();
        if (UserConfirms::where('session_id', $session_id)->first()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
