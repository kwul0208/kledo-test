<?php

namespace App\Http\Controllers;

use App\Models\Settings as ModelsSettings;
use Illuminate\Http\Request;

class Settings extends Controller
{
    static public function index($key, $value)
    {
        ModelsSettings::where('key', $key)->update([
            'value' => $value
        ]);
        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
