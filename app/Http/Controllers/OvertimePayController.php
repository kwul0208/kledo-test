<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class OvertimePayController extends Controller
{
    static public function index($month)
    {
        
        $data = Employees::with('overtimes')->get();

        return response([
            'status' => 200,
            'message' => $data
        ]);

    }
}
