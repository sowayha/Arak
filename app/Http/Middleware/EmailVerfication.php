<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;
use Schema;

class EmailVerfication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (Schema::hasTable('email_checks')) {
            $emailCheck = DB::table('email_checks')->find(1);
            if(! $emailCheck){
                    $data = array();
                    $data['check'] = 0;
                    DB::table('email_checks')->insert($data);
             }}

        if($emailCheck->check == 1){

            if (! $request->user() ||
                ($request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail())) {
                return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
            }
        }

        return $next($request);
    }
    }
