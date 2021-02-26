<?php

namespace App\Http\Controllers;

use App\Models\Il;
use App\Models\Ilce;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getil()
    {
        $il=Il::all();

        return response()->json($il);
    }

    public function getilce(Request $request)
    {
        if ($request->il_id=='*')
            return null;
        $ilceler=Il::find($request->il_id)->ilces;

        return response()->json($ilceler);
    }

    public function getsistem(Request $request)
    {
        if ($request->ilce_id=='*')
            return null;
        $sistemler=Ilce::find($request->ilce_id)->sistems;

        return response()->json($sistemler);
    }

}
