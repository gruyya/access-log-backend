<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CreateUnitController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Unit/Create', [
            'storeUnitRoute' => route('units.store')
        ]);
    }
}
