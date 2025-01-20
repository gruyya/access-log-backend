<?php

namespace App\Http\Controllers\Employee;

use App\Enums\RankType;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreEmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'image' => ['nullable'],
            'jmbg' => ['required', 'string', 'max:13'],
            'rank' => ['required', 'string', Rule::enum(RankType::class)],
            'unit_id' => ['nullable', 'exists:units,id'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
        }

        Employee::query()
            ->create([
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'],
                'last_name' => $validatedData['last_name'],
                'image' => $path ?? null,
                'jmbg' => $validatedData['jmbg'],
                'rank' => $validatedData['rank'],
                'unit_id' => 1,
            ]);
    }
}
