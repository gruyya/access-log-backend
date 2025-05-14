<?php

namespace App\Console\Commands;

use App\Models\EmployeeAccessLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use League\Csv\Writer;
use SplTempFileObject;

class GenerateTrainingCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-training-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logs = DB::table('employee_access_logs')
            ->select('employee_id', DB::raw('TIME(created_at) as time'), DB::raw('DAYOFWEEK(created_at)-1 as day_off_week'), 'created_at')
            ->whereNull('deleted_at')
            ->orderBy('employee_id')
            ->orderBy('created_at')
            ->get();

        $data = [];
        $userStats = [];

        foreach ($logs as $log) {
            $minutes = intval(date('H', strtotime($log->time))) * 60 + intval(date('i', strtotime($log->time)));

            if (!isset($userStats[$log->employee_id])) {
                $userStats[$log->employee_id] = [
                    'times' => [],
                    'last_late' => 0
                ];
            }

            $prosek = count($userStats[$log->employee_id]['times']) > 0
                ? intval(array_sum($userStats[$log->employee_id]['times']) / count($userStats[$log->employee_id]['times']))
                : $minutes;

            $was_late_yesterday = $userStats[$log->employee_id]['last_late'];
            $late = $minutes > 420 ? 1 : 0; // late ako je posle 07:00

            $data[] = [
                'user_id' => $log->employee_id,
                'day_off_week' => $log->day_off_week,
                'average_entry_time' => $prosek,
                'was_late_yesterday' => $was_late_yesterday,
                'late' => $late
            ];

            $userStats[$log->employee_id]['times'][] = $minutes;
            $userStats[$log->employee_id]['last_late'] = $late;
        }

        $filename = storage_path('app/training_data.csv');
        $file = fopen($filename, 'w');
        fputcsv($file, ['user_id', 'day_off_week', 'average_entry_time', 'was_late_yesterday', 'late']);

        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
        $this->info('training_data.csv je generisan.');
    }
}
