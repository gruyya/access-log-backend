<?php

namespace App\Http\Controllers\Gate;

use App\Http\Controllers\Controller;
use App\Models\Barrack;
use App\Models\Gate;
use Inertia\Inertia;
use Inertia\Response;

class EditGateController extends Controller
{
    public function __invoke(Gate $gate): Response
    {
        return Inertia::render('Gate/Edit', [
            'barracks' => Barrack::query()->get()->map(function (Barrack $barrack) {
                return [
                    'id' => $barrack->id,
                    'name' => $barrack->name,
                ];
            }),
            'gate' => [
                'id' => $gate->id,
                'barrack' => [
                    'id' => $gate->barrack->id,
                    'name' => $gate->barrack->name,
                ],
                'name' => $gate->name,
                'ip_address' => $gate->ip_address,
                'phone_number' => $gate->phone_number,
            ],
        ]);
    }
}
