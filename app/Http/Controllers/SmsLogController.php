<?php

namespace App\Http\Controllers;

use App\Models\Sistem;
use App\Models\SmsLog;
use Illuminate\Http\Request;
use Storage;

class SmsLogController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get first array in request
        $data = $request[0];

        //append data into log
        Storage::append('sms.log', json_encode($data) . "\n");

        //convert the number to the correct format
        $number = $this->phone($data['source_addr']);

        //explode the data
        $veriler = explode(',', $data['content']);

        // get a record from related phone number.
        $depo = Sistem::where('klorlama_tel', $number)
            ->first();

        $motor = Sistem::where('motor_tel', $number)
            ->first();
        if ($depo)
        {
            //sistem record
            foreach ($veriler as $veri)
            {
                $alanlar = explode(':', $veri);
                $anahtar = $this->getDepoField($alanlar[0]);
                if ($anahtar)
                {
                    $deger = $alanlar[1];
                    $depo[$anahtar] = $deger;
                    $depo->save();
                    print  $anahtar . '=' . $deger . "\n";
                }
            }
        }

        if ($motor)
        {
            //sistem record
            foreach ($veriler as $veri)
            {
                $alanlar = explode(':', $veri);
                $anahtar = $this->getMotorField($alanlar[0]);
                if ($anahtar)
                {
                    $deger = $alanlar[1];
                    $motor[$anahtar] = str_replace('%','',$deger);
                    $motor->save();
                    print  $anahtar . '=' . $deger . "\n";
                }
            }
        }

        return SmsLog::create([
            'numara' => $data['source_addr'],
            'mesaj' => $data['content'],
            'tarih' => $data['received_at'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SmsLog $smsLog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SmsLog $smsLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsLog $smsLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SmsLog $smsLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsLog $smsLog)
    {
        //
    }


    public function phone($num)
    {
        return
            "0 "
            . "(" . substr($num, 2, 3)
            . ") "
            . substr($num, 5, 3)
            . "-"
            . substr($num, 8);
    }

    public function getDepoField($key)
    {
        switch ($key) {
            case 1 :
                return "klor_durum";
            case 4:
                return "pompa";
            default:
                return null;

        }
    }
    public function getMotorField($key)
    {
        switch ($key) {
            case 1 :
                return "motor_durum";
            case 2:
                return "elektrik_durum";
            case 'A2':
                return "depo_seviye";
            default:
                return null;

        }
    }
}
