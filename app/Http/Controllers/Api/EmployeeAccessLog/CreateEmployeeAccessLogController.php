<?php

namespace App\Http\Controllers\Api\EmployeeAccessLog;

use App\Enums\BarcodeType;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeAccessLog;
use Illuminate\Validation\ValidationException;
use App\Models\Gate;

class CreateEmployeeAccessLogController extends Controller
{
    public function __invoke(Request $request): EmployeeResource
    {

        $validatedData = $request->validate([
            'barcode' => ['required']
        ]);

        $employee = Employee::query()
            ->with('unit')
            ->where('barcode_in', $validatedData['barcode'])
            ->orWhere('barcode_out', $validatedData['barcode'])
            ->first();

        if (!$employee) {
            throw ValidationException::withMessages([
                'barcode' => ['The barcode is not assigned to any employee.'],
            ]);
        }

        $gate = Gate::query()->where('ip_address', $request->ip())->first();

        EmployeeAccessLog::query()
            ->create([
                'employee_id' => $employee->id,
                'gate_id' => $gate?->id,
                'barcode_type' => $validatedData['barcode'] === $employee->barcode_in ? BarcodeType::IN : BarcodeType::OUT,
            ]);

        return new EmployeeResource($employee);
    }
}
