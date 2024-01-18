<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->isLogin()) {
            return redirect(route('home'));
        }
        // dd($request);
        if ($request->is('admin/*') || $request->is('admin')) {
            echo '<h3>Admin Section</h3>';
        }
        echo '<h2>Client Section</h2>';
        return $next($request);
    }

    public function isLogin()
    {
        return true;
    }
}
