<?php

namespace App\Http\Controllers\Employee;

use App\Enums\RankType;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Inertia\Inertia;
use Inertia\Response;

class CreateEmployeeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Employee/Create', [
            'ranks' => RankType::cases(),
            'units' => Unit::query()->get()->map(function (Unit $unit) {
                return [
                    'id' => $unit->id,
                    'name' => $unit->name,
                ];
            }),
        ]);
    }
}
