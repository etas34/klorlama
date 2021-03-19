<?php

namespace App\Http\Controllers;

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
        $data = $request[0];
        Storage::append('sms.log', json_encode($data) . "\n");

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
}
