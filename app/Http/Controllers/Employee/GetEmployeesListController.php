<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Inertia\Inertia;
use Inertia\Response;

class GetEmployeesListController extends Controller
{
    public function __invoke(): Response
    {
        $employees = Employee::query()
            ->with('unit')
            ->get();

        return Inertia::render('Employee/List', [
            'createEmployeeRoute' => route('employees.create'),
            'employees' => $employees->map(function (Employee $employee) {
                return [
                    'id' => $employee->id,
                    'unit' => $employee->unit->name,
                    'first_name' => $employee->first_name,
                    'midle_name' => $employee->midle_name,
                    'last_name' => $employee->last_name,
                    'image' => $employee->image,
                    'jmbg' => $employee->jmbg,
                    'rank' => $employee->rank,
                    'barcode_in' => $employee->barcode_in,
                    'barcode_out' => $employee->barcode_out,
                ];
            }),
        ]);
    }
}