<?php

namespace App\Http\Controllers\Gate;

use App\Http\Controllers\Controller;
use App\Models\Barrack;
use Inertia\Inertia;
use Inertia\Response;

class CreateGateController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Gate/Create', [
            'storeGateRoute' => route('gates.store'),
            'barracks' => Barrack::query()->get()->map(function (Barrack $barrack) {
                return [
                    'id' => $barrack->id,
                    'name' => $barrack->name,
                ];
            }),
        ]);
    }
}
