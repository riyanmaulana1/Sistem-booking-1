<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware-> redirectGuestsTo(fn(Request $request)=> route('pengelola.masuk'));
        $middleware-> redirectUsersTo(function(Request $request){
                if (Auth::guard('admin')->check()){
                    return route('admin.beranda');
                }
                if (Auth::guard('instansi')->check()){
                    return route('penyetuju.beranda');
                }
                return url('/');
        });

    })
    ->withExceptions(function (Exceptions $exceptions): void {
    //
    })->create();
