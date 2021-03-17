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
//        Storage::put('file.txt', $data['content']);
//        $data->validate(
//            [
//                'source_addr' => 'required|max:255',
//                'content' => 'required',
//                'received_at' => 'required|max:255',
//            ]
//        );
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
       55 / 0;
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
