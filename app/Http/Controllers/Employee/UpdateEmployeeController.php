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
            'jmbg' => ['required', 'digits:13', Rule::unique('employees')->ignore($employee)],
            'barcode_in' => ['required', 'digits:4', Rule::unique('employees')->ignore($employee)],
            'barcode_out' => [
                'required',
                'digits:4',
                Rule::unique('employees')->ignore($employee)
            ],
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
            'image' => $employee->image,
            'jmbg' => $validatedData['jmbg'],
            'barcode_in' => $validatedData['barcode_in'],
            'barcode_out' => $validatedData['barcode_out'],
            'rank' => $validatedData['rank'],
            'unit_id' => $validatedData['unit_id'],
        ]);

        return redirect()->route('employees.list')->with('success', "
            Podaci zapolsenog {$employee->first_name} {$employee->last_name} su uspešno ažurirani.
        ");
    }
}
