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
        //
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

       $status = Sistem::create([
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sistem $sistem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sistem $sistem)
    {
        //
    }
}
