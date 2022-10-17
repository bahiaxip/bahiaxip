<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;

class Admin
{

    public $user;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->user = Auth::user();
        if($this->user && $this->user->code == 'active'):
            return $next($request);
        else:
            return redirect('/');
        endif;
    }
}
