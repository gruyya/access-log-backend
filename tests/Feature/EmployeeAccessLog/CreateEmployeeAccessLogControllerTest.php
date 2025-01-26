<?php

namespace Tests\Feature\EmployeeAccessLog;

use App\Enums\BarcodeType;
use App\Http\Controllers\EmployeeAccessLog\CreateEmployeeAccessLogController;
use App\Models\Employee;
use App\Models\EmployeeAccessLog;
use App\Models\EmployeeBarcode;
use App\Models\Gate;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateEmployeeAccessLogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_employee_access_log_can_be_created(): void
    {
        $this->withoutExceptionHandling();

        CarbonImmutable::setTestNow(CarbonImmutable::parse('2025-01-01 08:00:00'));

        Employee::factory()->createOne([
            'id' => 143,
            'first_name' => 'John',
            'last_name' => 'Doe',
            "barcode_in" => "1234567890",
            "barcode_out" => "1235455"
        ]);
 
        Gate::factory()->create([
            'id' => 4545,
            'ip_address' => '127.0.0.1', 
            'name' => 'Gate 1'
        ]);

        $response = $this
            ->post('/api/employee-access-logs', [
                'barcode' =>"1234567890",
            ]);

        $response
            ->assertCreated()
            ->assertJson(['message' => 'Access log created successfully.']);

        $log = EmployeeAccessLog::query()->first();

        $this->assertEquals(143, $log->employee_id);
        $this->assertEquals(4545, $log->gate_id);
        $this->assertEquals(BarcodeType::IN, $log->barcode_type);
        $this->assertEquals('2025-01-01 08:00:00', $log->created_at->format('Y-m-d H:i:s'));
    }
}