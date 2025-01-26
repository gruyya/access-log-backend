<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller; 
use App\Models\Unit;
use Inertia\Inertia;
use Inertia\Response;

class GetUnitsListController extends Controller
{
    public function __invoke(): Response
    {
        $units = Unit::query()->get();

        return Inertia::render('Unit/List', [
            'createUnitRoute' => route('units.create'),
            'units' => $units->map(function (Unit $unit) {
                return [
                    'id' => $unit->id,
                    'name' => $unit->name,
                ];
            }),
        ]);
    }
}