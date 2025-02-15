<?php

namespace App\Http\Controllers\Gate;

use App\Http\Controllers\Controller;
use App\Models\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class UpdateGateController extends Controller
{
    public function __invoke(Request $request, Gate $gate): RedirectResponse
    {
        $validatedData = $request->validate([
            'barrack_id' => ['required', 'exists:barracks,id'],
            'name' => ['required', 'string', 'max:255'],
            'ip_address' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
        ]);

        $gate->update([
            'barrack_id' => $validatedData['barrack_id'],
            'name' => $validatedData['name'],
            'ip_address' => $validatedData['ip_address'],
            'phone_number' => $validatedData['phone_number'] ?? null,
        ]);

        return redirect()->route('gates.list');
    }
}
