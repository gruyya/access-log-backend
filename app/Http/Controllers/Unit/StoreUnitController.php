<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class StoreUnitController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Unit::query()->create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('units.list');
    }
}
