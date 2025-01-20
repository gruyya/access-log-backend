<?php

namespace App\Http\Controllers\EmployeeAccessLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAccessLog;
use App\Models\EmployeeBarcode;
use Illuminate\Validation\ValidationException;
use App\Models\Gate;
use Carbon\CarbonImmutable;

class CreateEmployeeAccessLogController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
    
        $validatedData = $request->validate([
            'barcode' => 'required|exists:employee_barcodes,code'
        ]);

        $barcode = EmployeeBarcode::query()->withWhereHas('employee')->where('code', $validatedData['barcode'])->first();

        if(!$barcode->employee) {
            throw ValidationException::withMessages([
                'barcode' => ['The barcode is not assigned to any employee.'],
            ]);
        }

        $gate = Gate::query()->where('ip_address', $request->ip())->first();

        EmployeeAccessLog::query()
            ->create([
                'employee_id' => $barcode->employee->id,
                'gate_id' => $gate?->id,
                'barcode_id' => $barcode->id,
            ]);

        return response()->json(['message' => 'Access log created successfully.'], 201);
    }
}