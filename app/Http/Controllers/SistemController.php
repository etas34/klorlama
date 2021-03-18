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
        $sistem = Sistem::where('durum', 1)
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
            'klorlama_tel' => 'max:255',
            'motor_tel' => 'max:255',
            'klor_olcum_tel' => 'max:255',
            'ust_limit' => 'max:255',
            'alt_limit' => 'max:255',
            'il_id' => 'required',
        ]);

        return $status = Sistem::create([
            'ilce_id' => $request['ilce_id'],
            'il_id' => $request['il_id'],
            'ad' => $request['ad'],
            'klorlama_tel' => $request['klorlama_tel'],
            'motor_tel' => $request['motor_tel'],
            'klor_olcum_tel' => $request['klor_olcum_tel'],
            'ust_limit' => $request['ust_limit'],
            'alt_limit' => $request['alt_limit'],
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
//        $yasakli_zaman = array();

        if ($sistem->yasakli_zaman) {
            $yasakli_zaman = explode('-', $sistem->yasakli_zaman);
            if (count($yasakli_zaman) == 2) {
                $sistem["yasakliZamanBas"] = $yasakli_zaman[0];
                $sistem["yasakliZamanBit"] = $yasakli_zaman[1];
            }

        }


        return view('sistem.show', compact('sistem'));
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
            'klorlama_tel' => 'max:255',
            'motor_tel' => 'max:255',
            'klor_olcum_tel' => 'max:255',
            'ust_limit' => 'max:255',
            'alt_limit' => 'max:255',
            'il_id' => 'required',
        ]);
        $sistem->ilce_id = $request['ilce_id'];
        $sistem->il_id = $request['il_id'];
        $sistem->ad = $request['ad'];
        $sistem->klorlama_tel = $request['klorlama_tel'];
        $sistem->motor_tel = $request['motor_tel'];
        $sistem->klor_olcum_tel = $request['klor_olcum_tel'];
        $sistem->ust_limit = $request['ust_limit'];
        $sistem->alt_limit = $request['alt_limit'];
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


    public function zamanAsim(Sistem $sistem, Request $request)
    {
        $validated = $request->validate([
            'pompa_zaman_asimi' => 'required',
        ]);
        $sistem->pompa_zaman_asimi = $request['pompa_zaman_asimi'];
        $sistem->save();

    }

    public function yasakliZaman(Sistem $sistem, Request $request)
    {
        $validated = $request->validate([
            'yasakli_zaman' => 'required',
        ]);
        $sistem->yasakli_zaman = $request['yasakli_zaman'];
        $sistem->save();

    }
    public function klorAtimSure(Sistem $sistem, Request $request)
    {
        $validated = $request->validate([
            'klor_atim_sure' => 'required',
        ]);
        $sistem->klor_atim_sure = $request['klor_atim_sure'];
        $sistem->save();

    }
    public function klorAtimPeriod(Sistem $sistem, Request $request)
    {
        $validated = $request->validate([
            'period_saat' => 'required|numeric',
            'period_saniye' => 'required|numeric',
        ]);
        $sistem->period_saniye = $request['period_saniye'];
        $sistem->period_saat = $request['period_saat'];

        $sistem->save();

    }

}
