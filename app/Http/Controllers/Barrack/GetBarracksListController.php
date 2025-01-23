<?php

namespace App\Http\Controllers\Barrack;

use App\Http\Controllers\Controller;
use App\Models\Barrack;
use Inertia\Inertia;
use Inertia\Response;

class GetBarracksListController extends Controller
{
    public function __invoke(): Response
    {
        $barracks = Barrack::query()->get();

        return Inertia::render('Barrack/List', [
              'createBarrackRoute' => route('barracks.create'),
                'barracks' => $barracks->map(function (Barrack $barrack) {
                    return [
                        'id' => $barrack->id,
                        'name' => $barrack->name,
                        'address' => $barrack->address,
                        'postal_code' => $barrack->postal_code,
                        'city' => $barrack->city,
                        'phone_number' => $barrack->phone_number,
                    ];
                }),
        ]);
    }
}