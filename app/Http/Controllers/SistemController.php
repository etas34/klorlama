<?php

namespace App\Http\Controllers;

use App\Models\Il;
use App\Models\Sistem;
use Illuminate\Http\Request;

class SistemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistem = Sistem::where('durum',1)
            ->get();
        return view('sistem.index', compact('sistem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('sistem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ilce_id' => 'required',
            'ad' => 'required|max:255',
            'telefon' => 'max:255',
            'il_id' => 'required',
        ]);

        return $status = Sistem::create([
            'ilce_id' => $request['ilce_id'],
            'il_id' => $request['il_id'],
            'ad' => $request['ad'],
            'telefon' => $request['telefon'],
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sistem $sistem
     * @return \Illuminate\Http\Response
     */
    public function show(Sistem $sistem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sistem $sistem
     * @return \Illuminate\Http\Response
     */
    public function edit(Sistem $sistem)
    {
        $sistem["il_ad"] = $sistem->il->ad;
        $sistem["ilce_ad"] = $sistem->ilce->ad;


        return view('sistem.edit', compact('sistem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sistem $sistem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sistem $sistem)
    {

        $validated = $request->validate([
            'ilce_id' => 'required',
            'ad' => 'required|max:255',
            'telefon' => 'max:255',
            'il_id' => 'required',
        ]);
       $sistem->ilce_id = $request['ilce_id'];
       $sistem->il_id = $request['il_id'];
       $sistem->ad = $request['ad'];
       $sistem->telefon = $request['telefon'];
       $sistem->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sistem $sistem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistem $sistem)
    {
        $sistem->durum = 0;
        $sistem->save();
        if ($sistem)
            toastr()->success('Kayıt Başarı İle Silindi');
        else
            toastr()->error('Kayıt Başarı İle Silindi');

        return redirect()->route('sistem.index');
    }
}
