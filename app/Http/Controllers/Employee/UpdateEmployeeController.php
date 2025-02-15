<?php

namespace App\Http\Controllers\Employee;

use App\Enums\RankType;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateEmployeeController extends Controller
{
    public function __invoke(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'image' => ['nullable'],
            'jmbg' => ['required', 'string', 'max:13'],
            'barcode_in' => ['required', 'string', 'max:255'],
            'barcode_out' => ['required', 'string', 'max:255'],
            'rank' => ['required', 'string', Rule::enum(RankType::class)],
            'unit_id' => ['nullable', 'exists:units,id'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
        }

        $employee->update([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'image' => $path ?? null,
            'jmbg' => $validatedData['jmbg'],
            'barcode_in' => $validatedData['barcode_in'],
            'barcode_out' => $validatedData['barcode_out'],
            'rank' => $validatedData['rank'],
            'unit_id' => $validatedData['unit_id'],
        ]);

        return redirect()->route('employees.list');
    }
}
