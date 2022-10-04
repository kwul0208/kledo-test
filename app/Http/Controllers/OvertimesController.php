<?php

namespace App\Http\Controllers;

use App\Models\Overtimes;
use Illuminate\Http\Request;

class OvertimesController extends Controller
{
    static public function index($employee_id, $date, $time_started, $time_ended)
    {
        Overtimes::create([
            'employee_id' => $employee_id,
            'date' => $date,
            'time_started' => $time_started,
            'time_ended' => $time_ended,
        ]);

        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
