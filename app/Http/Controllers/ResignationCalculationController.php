<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateResignationRequest;
use App\Services\ResignationCalculator;
use Illuminate\Http\JsonResponse;

final class ResignationCalculationController
{
    public function __invoke(CalculateResignationRequest $request, ResignationCalculator $calculator): JsonResponse
    {
        $result = $calculator->calculate(
            joiningDate: $request->date('joining_date'),
            noticeDate: $request->date('notice_date'),
            lastWorkingDate: $request->date('last_working_date'),
            basicSalaryAtLastWorkingDate: (string) $request->validated('basic_salary'),
        );

        return response()->json($result);
    }
}
