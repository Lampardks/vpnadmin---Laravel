<?php

use Illuminate\Database\Seeder;

class TransfersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class, 'admin', mt_rand(3, 7))->create()->each(function ($company) {
            factory(App\Employee::class, 'admin', mt_rand(3, 10))
                ->create()
                ->each(function ($employee) use($company) {
                    $employee->company()->associate($company);
                    $employee->save();
                });
        });

        set_time_limit(3600);
        ini_set('memory_limit', '512M');

        $start = new \Carbon\Carbon('first day of last month');
        $end = new \Carbon\Carbon('last day of last month');
        for ($i = 0, $k = 1; $i < 6; $i++) { 
            App\Employee::all()->each(function ($employee) use($i, &$k, &$start, &$end) { 
                factory(App\TransferLog::class, 'admin', mt_rand(7, 15))->create()->each(function ($transfer) use($employee, $i, &$k, &$start, &$end) {
                    // $start = new \Carbon\Carbon('first day of last month');
                    // $end = new \Carbon\Carbon('last day of last month'); 
                    if ($i != 0 && $i == $k) {
                        $k++;
                        $start->subMonths(1);
                        $end->subMonths(1);
                    }   

                    $randomDate = \Carbon\Carbon::createFromTimestamp(rand($end->timestamp, $start->timestamp))->format('Y-m-d H:i:s');

                    $transfer->date_time = $randomDate;
                    $transfer->employee()->associate($employee);                
                    $transfer->save();
                }); 
            });
        }
    }
}
