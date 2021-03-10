<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Yetki
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (\Auth::user()->sistem_id == "*")
            dd("Muhtarlıklara yetki");
        elseif (\Auth::user()->sistem_id != null)
            return redirect();


        if (\Auth::user()->ilce_id == "*")
            dd("Tum ilçeler");
        elseif (\Auth::user()->ilce_id != null)
            dd("ilce id");


        if (\Auth::user()->il_id == "*")
            dd ("God mode");
        elseif (\Auth::user()->il_id != null)
            dd("İl id");


        dd('Hiç bir yetki bulunamadı kullanıcı, bu hesabı kullanmaya müsait değil. ');
    }
}
