<?php

namespace App\Http\Controllers\Barrack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barrack;

class StoreBarrackController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
        ]);

        Barrack::query()
            ->create([
                'name' => $validatedDate['name'],
                'address' => $validatedDate['address'],
                'postal_code' => $validatedDate['postal_code'],
                'city' => $validatedDate['city'],
                'phone_number' => $validatedDate['phone_number'],   
            ]);

        return redirect()->route('barracks.list');
    }
}