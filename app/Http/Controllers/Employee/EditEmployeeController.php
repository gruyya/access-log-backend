<?php

namespace App\Http\Controllers\Employee;

use App\Enums\RankType;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Unit;
use Inertia\Inertia;
use Inertia\Response;

class EditEmployeeController extends Controller
{
    public function __invoke(Employee $employee): Response
    {
        return Inertia::render('Employee/Edit', [
            'ranks' => RankType::cases(),
            'units' => Unit::query()->get()->map(function (Unit $unit) {
                return [
                    'id' => $unit->id,
                    'name' => $unit->name,
                ];
            }),
            'employee' => [
                'id' => $employee->id,
                'unit_id' => $employee->unit_id,
                'first_name' => $employee->first_name,
                'middle_name' => $employee->middle_name,
                'last_name' => $employee->last_name,
                'image' => $employee->image,
                'jmbg' => $employee->jmbg,
                'barcode_in' => $employee->barcode_in,
                'barcode_out' => $employee->barcode_out,
                'rank' => $employee->rank,
            ],
        ]);
    }
}