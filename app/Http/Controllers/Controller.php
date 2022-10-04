<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="My First API", version="0.1")
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * @OA\Put(
     *     path="/api/settings",
     *     tags={"settings"},
     *     summary="Returns a Sample API response",
     *     description="A sample setting to test out the API",
     *     operationId="sett",
     *     @OA\Parameter(
     *          name="key",
     *          description="key",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Parameter(
     *          name="value",
     *          description="value",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *         ),
     *     ),
     * )
     */
    public function settings(Request $request)
    {
        $request->validate([
            'key' => 'in:overtime_method',
            'value' => 'exists:references,id'
        ]);
        return Settings::index($request->key, $request->value);
    }
    /**
     * @OA\Post(
     *     path="/api/employees",
     *     tags={"employees"},
     *     summary="Returns a Sample API response",
     *     description="A sample employees to test out the API",
     *     operationId="employees",
     *     @OA\Parameter(
     *          name="name",
     *          description="name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="salary",
     *          description="salary",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation",
     *           @OA\MediaType(
     *              mediaType="application/json",
     *         ),
     *     )
     * )
     */
    public function employees(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|unique:employees',
            'salary' => 'required|integer|between:1000000,2000000'
        ]);
        return EmployeesController::index($request->name, $request->salary);
    }
    /**
     * @OA\Post(
     *     path="/api/overtimes",
     *     tags={"overtimes"},
     *     summary="Returns a Sample API response",
     *     description="A sample overtimes to test out the API",
     *     operationId="overtimes",
     *     @OA\Parameter(
     *          name="employee_id",
     *          description="employee_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="date",
     *          description="date",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="time_started",
     *          description="time_started",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="time_ended",
     *          description="time_ended",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation",
     *           @OA\MediaType(
     *              mediaType="application/json",
     *         ),
     *     )
     * )
     */
    public function overtimes(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'date' => 'required|unique:overtimes,date',
            'time_started' => 'required|date_format:H:i',
            'time_ended' => 'required|date_format:H:i|after:time_started'
        ]);

        return OvertimesController::index($request->employee_id, $request->date, $request->time_started, $request->time_ended);
    }
    /**
     * @OA\Get(
     *     path="/api/overtime-pays/calculate",
     *     tags={"overtime-pays calculate"},
     *     summary="Returns a Sample API response",
     *     description="A sample calculate to test out the API",
     *     operationId="calculate",
     *     @OA\Parameter(
     *          name="month",
     *          description="month (2022-09)",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation",
     *           @OA\MediaType(
     *              mediaType="application/json",
     *         ),
     *     )
     * )
     */
    public function calculate(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m'
        ]);

        return OvertimePayController::index($request->month);
    }
}
