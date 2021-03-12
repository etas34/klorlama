<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(Auth::user()->getYetki());
        return view('home');
    }

    public function dashboard()
    {
        $sistem = Auth::user()->getYetki();

        if (\Auth::user()->sistem_id == "*") //all muhtarlik
            return view('sistem.index',compact('sistem'));
        elseif (\Auth::user()->sistem_id != null) // muhtar id
            return redirect()->route('sistem.show',\Auth::user()->sistem_id  );
        if (\Auth::user()->ilce_id == "*") //"Tum ilçeler"
          return view('il',compact('sistem'));
        elseif (\Auth::user()->ilce_id != null) //"ilce id"
            return redirect()->route('sistem.index',compact('sistem'));

        if (\Auth::user()->il_id == "*") //"God mode"
            return view('dashboard');
        elseif (\Auth::user()->il_id != null) // il id
            return redirect()->route('sistem.index',compact('sistem'));


        dd('Hiç bir yetki bulunamadı kullanıcı, bu hesabı kullanmaya müsait değil. ');


    }


}
