<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAccessLog;
use Inertia\Inertia;
use Inertia\Response;


class GetEmployeeAccessLogController extends Controller
{
    public function __invoke(Employee $employee): Response
    {
        $logs = EmployeeAccessLog::query()
            ->where('employee_id', $employee->id)
            ->with(['gate.barrack', 'employee.unit'])
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Employee/AccessLogList', [
            'employee' => [
                'id' => $employee->id,
                'name' => $employee->first_name . ' ' . $employee->last_name,
                'unit' => $employee->unit->name,
                'rank' => $employee->rank,
                'image' => url($employee->image),
            ],
            'logs' => $logs->map(function (EmployeeAccessLog $log) {
                return [
                    'id' => $log->id,
                    'barrack_name' => $log->gate?->barrack?->name,
                    'gate_name' => $log->gate?->name,
                    'barcode_type' => $log->barcode_type,
                    'created_at' => $log->created_at->format('Y-m-d H:i'),
                ];
            }),
        ]);
    }
}
