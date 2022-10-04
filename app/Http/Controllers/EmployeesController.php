<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    static public function index($name, $salary)
    {
        Employees::create([
            'name' => $name,
            'salary' => $salary
        ]);
        return response([
            'status' => 200,
            'messsage' => 'success'
        ]);
    }
}
