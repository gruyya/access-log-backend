<?php

namespace App\Http\Controllers\Gate;

use App\Http\Controllers\Controller;
use App\Models\Gate;
use Inertia\Inertia;
use Inertia\Response;

class GetGatesListController extends Controller
{
    public function __invoke(): Response
    {
        $gates = Gate::query()->with('barrack')->get();

        return Inertia::render('Gate/List', [
            'createGateRoute' => route('gates.create'),
            'gates' => $gates->map(function (Gate $gate) {
                return [
                    'id' => $gate->id,
                    'name' => $gate->name,
                    'barrack' => [
                        'id' => $gate->barrack->id,
                        'name' => $gate->barrack->name,
                    ],
                    'ip_address' => $gate->ip_address,
                    'phone_number' => $gate->phone_number,
                ];
            }),
        ]);
    }
}
