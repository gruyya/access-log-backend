<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GetEmployeesListController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $employees = Employee::query()
            ->with('unit')
            ->with('employeeBarcodes')
            ->get();

        return Inertia::render('Employee/List', [
            'addEmployeeRoute' => route('employees.create'),
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
                    'employeeBarcodes' => $employee->employeeBarcodes->map(function ($barcode) {
                        return [
                            'id' => $barcode->id,
                            'code' => $barcode->code,
                            'type' => $barcode->type,
                        ];
                    }),
                ];
            }),
        ]);
    }
}