<?php

namespace App\Http\Controllers;

use App\Models\Il;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getil()
    {
        $il=Il::all();

        return response()->json($il);
    }
}
